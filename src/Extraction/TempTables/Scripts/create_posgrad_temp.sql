-- First, get filtered, basic data
SELECT
	ap.codpes AS 'numero_usp'
	,ap.numseqpgm AS 'seq_programa'
	,ap.codare AS 'codigo_area'
	,ap.dtaselpgm AS 'data_selecao'
	,ap.nivpgm AS 'nivel_programa'
	,ap.dtadpopgm AS 'data_deposito_trabalho'
	,ap.dtaaprbantrb AS 'data_aprovacao_trabalho'
INTO #filtered
FROM AGPROGRAMA ap
WHERE YEAR(ap.dtaselpgm) >= 2007
	AND ap.codare BETWEEN 8000 AND 8999
	AND ap.vinalupgm = 'REGULAR';


-- Get transfers
SELECT 
	t.codpes AS 'numero_usp'
	,t.codare AS 'codigo_area'
	,t.numseqpgm AS 'seq_programa'
	,h.dtaocopgm AS 'data_transferencia'
INTO #transferencias
FROM HISTPROGRAMA h
	INNER JOIN TRANSFERAREA t
		ON h.codpes = t.codpes
			AND h.codare = t.codareori
			AND h.numseqpgm = t.numseqpgmori
			AND h.codaretrf = t.codare
WHERE t.codare BETWEEN 8000 AND 8999;

SELECT 
	f.*
	,CASE WHEN t.data_transferencia IS NOT NULL
		THEN 'Transferência'
		ELSE 'Selecionado'
		END AS 'tipo_admissao'
	,CASE WHEN t.data_transferencia IS NOT NULL
		THEN t.data_transferencia
		ELSE f.data_selecao
		END AS 'data_admissao'
INTO #admission
FROM #filtered f
	LEFT JOIN #transferencias t
		ON f.numero_usp = t.numero_usp
			AND f.codigo_area = t.codigo_area
			AND f.seq_programa = t.seq_programa;


-- Get AREA names
SELECT *
INTO #areas
FROM NOMEAREA na
WHERE na.codare BETWEEN 8000 AND 8999;


-- Get CURSO names
SELECT *
INTO #programas
FROM NOMECURSO nc
WHERE nc.codcur BETWEEN 8000 AND 8999;


-- Alter AREA e CURSO names validity
UPDATE #areas
SET dtainiare = '1900-01-01'
WHERE dtainiare = (
    SELECT MIN(a2.dtainiare)
    FROM #areas a2
    WHERE a2.codare = #areas.codare
);

UPDATE #areas
SET dtafimare = DATEADD(day, 1, GETDATE())
WHERE dtainiare = (
    SELECT MAX(a2.dtainiare)
    FROM #areas a2
    WHERE a2.codare = #areas.codare
);

UPDATE #programas
SET dtainicur = '1900-01-01'
WHERE dtainicur = (
    SELECT MIN(p2.dtainicur)
    FROM #programas p2
    WHERE p2.codcur = #programas.codcur
);

UPDATE #programas
SET dtafimcur = DATEADD(day, 1, GETDATE())
WHERE dtainicur = (
    SELECT MAX(p2.dtainicur)
    FROM #programas p2
    WHERE p2.codcur = #programas.codcur
);

-- Join specifications
SELECT
	adm.*
    ,a.nomare AS 'nome_area'
	,p.codcur AS 'codigo_programa'
	,p.nomcur AS 'nome_programa'
INTO #specs
FROM #admission adm
    LEFT JOIN #areas a
        ON adm.codigo_area = a.codare
            AND adm.data_admissao BETWEEN a.dtainiare AND a.dtafimare
    LEFT JOIN #programas p
        ON a.codcur = p.codcur
            AND adm.data_admissao BETWEEN p.dtainicur AND p.dtafimcur;


-- Join HISTPROGRAMA to get student's first enrollment
SELECT
    s.*
    ,jn.dtaocopgm AS 'primeira_matricula'
INTO #primeira_matricula
FROM #specs s
    LEFT JOIN
            (SELECT 
                h2.codpes AS 'numero_usp'
                ,h2.numseqpgm AS 'seq_programa'
                ,h2.codare AS 'codigo_area'
                ,MIN(h2.dtaocopgm) AS 'dtaocopgm'
            FROM HISTPROGRAMA h2
            WHERE h2.tiphstpgm = 'MAR'
            GROUP BY h2.codpes, h2.numseqpgm, h2.codare) jn
                ON jn.numero_usp = s.numero_usp 
                    AND jn.seq_programa = s.seq_programa
                    AND jn.codigo_area = s.codigo_area;


-- Create an occurrences table, adding minutes according to occurrence
SELECT
	h3.codpes AS 'numero_usp'
	,h3.numseqpgm AS 'seq_programa'
	,h3.codare AS 'codigo_area'
	,h3.tiphstpgm AS 'tipo_ocorrencia'
	,CASE h3.tiphstpgm
		WHEN 'CON' THEN DATEADD(mi, 5, h3.dtaocopgm)
		WHEN 'TFA' THEN DATEADD(mi, 4, h3.dtaocopgm)
		WHEN 'DES' THEN DATEADD(mi, 3, h3.dtaocopgm)
		WHEN 'RTO' THEN DATEADD(mi, 2, h3.dtaocopgm)
		WHEN 'NMT' THEN DATEADD(mi, 1, h3.dtaocopgm)
		ELSE h3.dtaocopgm
		END AS 'data_ocorrencia'
INTO #ocorrencias
FROM HISTPROGRAMA h3
WHERE h3.codare BETWEEN 8000 AND 8999;


-- Get last occurrence from occurrences table
SELECT 
	o.numero_usp
	,o.seq_programa
	,o.codigo_area
	,o.tipo_ocorrencia AS 'tipo_ultima_ocorrencia'
	,o.data_ocorrencia AS 'data_ultima_ocorrencia'
INTO #ultima_ocorrencia
FROM #ocorrencias o
	INNER JOIN (
		SELECT
			o2.numero_usp
			,o2.seq_programa
			,o2.codigo_area
			,MAX(o2.data_ocorrencia) AS 'data_ultima_ocorrencia'
	  	FROM #ocorrencias o2
	  	GROUP BY o2.numero_usp, o2.seq_programa, o2.codigo_area
	) o2 ON o.numero_usp = o2.numero_usp 
			AND o.seq_programa = o2.seq_programa 
			AND o.codigo_area = o2.codigo_area 
			AND o.data_ocorrencia = o2.data_ultima_ocorrencia;


-- Join our main table to our last_occurrence table
SELECT
	p.numero_usp
	,p.seq_programa
	,p.codigo_area
	,p.nome_area
	,p.codigo_programa
	,p.nome_programa
	,p.data_selecao
	,p.primeira_matricula
	,t.dschstpgm AS 'tipo_ultima_ocorrencia'
	,u.data_ultima_ocorrencia
	,p.nivel_programa
	,p.data_deposito_trabalho
	,p.data_aprovacao_trabalho
INTO #posgraduacoes
FROM #primeira_matricula p
	LEFT JOIN #ultima_ocorrencia u
		ON p.numero_usp = u.numero_usp
			AND p.seq_programa = u.seq_programa
			AND p.codigo_area = u.codigo_area
	LEFT JOIN TABHISTPROG t
		ON u.tipo_ultima_ocorrencia = t.tiphstpgm;


-- Drop all unnecessary temp tables
DROP TABLE #filtered;
DROP TABLE #transferencias;
DROP TABLE #admission;
DROP TABLE #areas;
DROP TABLE #programas;
DROP TABLE #specs;
DROP TABLE #primeira_matricula;
DROP TABLE #ocorrencias;
DROP TABLE #ultima_ocorrencia;
