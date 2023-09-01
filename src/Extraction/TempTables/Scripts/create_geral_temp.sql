-- Get NUSPs
SELECT DISTINCT(codpes) AS 'numero_usp'
INTO #nusps
FROM (
    -- alunos_graduacao
    SELECT p.codpes
    FROM HABILPROGGR hp
        INNER JOIN PROGRAMAGR p ON (hp.codpes = p.codpes AND hp.codpgm = p.codpgm)
    WHERE hp.codcur BETWEEN 8000 and 8999
        AND YEAR(p.dtaing) >= 2007
    UNION ALL
    -- ministrantes_graduacao
    SELECT m.codpes
    FROM MINISTRANTE m
			LEFT JOIN DISCIPGRCODIGO d ON m.coddis = d.coddis
		WHERE d.codclg = 8
			AND YEAR(m.dtainiaul) >= 2007
    UNION ALL
    -- alunos_posgraduacao
    SELECT a.codpes
    FROM AGPROGRAMA a
    WHERE a.codare BETWEEN 8000 and 8999
        AND a.vinalupgm <> 'ESPECIAL'
    UNION ALL
    -- pesquisadores_posdoc
    SELECT pd.codpes_pd AS 'codpes'
    FROM PDPROJETO pd
    WHERE pd.codund = 8
        AND YEAR(pd.dtainiprj) >= 2007
    UNION ALL
    -- alunos_ceu
    SELECT m.codpes
    FROM MATRICULACURSOCEU m
        INNER JOIN EDICAOCURSOOFECEU e ON (m.codcurceu = e.codcurceu AND m.codedicurceu = e.codedicurceu AND m.numseqofeedi = e.numseqofeedi)
    WHERE m.codund = 8
        AND YEAR(e.dtainiofeedi) >= 2007
    UNION ALL
    --coordenadores_ceu
    SELECT r.codpes
    FROM RESPONSAVELEDICAOCEU r
        LEFT JOIN EDICAOCURSOOFECEU e
            ON r.codcurceu = e.codcurceu AND r.codedicurceu = e.codedicurceu AND r.numseqofeedi = e.numseqofeedi
    WHERE YEAR(e.dtainiofeedi) >= 2007
    UNION ALL
    --ministrantes_ceu
    SELECT m.codpes
    FROM MINISTRANTECEU m
        LEFT JOIN ATUACAOCEU a 
            ON m.codatc = a.codatc
        LEFT JOIN OFERECIMENTOATIVIDADECEU o
            ON m.codofeatvceu = o.codofeatvceu
        LEFT JOIN EDICAOCURSOOFECEU e
            ON o.codcurceu = e.codcurceu AND o.codedicurceu = e.codedicurceu AND o.numseqofeedi = e.numseqofeedi
    WHERE YEAR(e.dtainiofeedi) >= 2007
    UNION ALL
    -- servidores e docentes
    SELECT v.codpes
    FROM VINCULOPESSOAUSP v
    WHERE v.tipvin IN ('SERVIDOR', 'ESTAGIARIO', 'ESTAGIARIORH', 'ESTAGIARIOPOS') 
        AND v.codfusclgund = 8
    UNION ALL
    -- credenciados pos-graduacao
    SELECT r.codpes
    FROM R25CRECREDOC r
    WHERE codare BETWEEN 8000 and 8999
) u;


-- Get info
SELECT
    p.codpes AS 'numero_usp'
    ,p.nompes AS 'nome'
    ,p.dtanas AS 'data_nascimento'
    ,c.dtaflc AS 'data_falecimento'
    ,e.codema AS 'email'
    ,p2.nacpas AS 'nacionalidade'
    ,l.cidloc AS 'cidade_nascimento'
    ,l.sglest AS 'estado_nascimento'
    ,p3.nompas AS 'pais_nascimento'
    ,c.codraccor AS 'raca'
    ,p.sexpes AS 'sexo'
    ,o.dscortsex AS 'orientacao_sexual'
    ,i.idegen AS 'identidade_genero'
    ,p4.sitvcipes AS 'situacao_vacinal_covid'
    ,p.numcpf AS 'cpf'
INTO #geral
FROM PESSOA p
    LEFT JOIN COMPLPESSOA c ON p.codpes = c.codpes
    LEFT JOIN PAIS p2 ON c.codpasnac = p2.codpas
    LEFT JOIN PAIS p3 ON c.codpasnas = p3.codpas
    LEFT JOIN LOCALIDADE l ON c.codlocnas = l.codloc
    LEFT JOIN EMAILPESSOA e ON p.codpes = e.codpes AND e.stamtr = 'S'
    LEFT JOIN ORIENTACAOSEXUAL o ON c.codortsex = o.codortsex
    LEFT JOIN IDENTIDADEGENERO i ON c.codidegen = i.codidegen
    LEFT JOIN PESSOAINFOVACINACOVID p4 ON p4.codpes = p.codpes
WHERE p.codpes IN (SELECT numero_usp FROM #nusps);

-- Drop all unnecessary temp tables
DROP TABLE #nusps;