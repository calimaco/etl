<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_pae' => fn($r) => ReplicadoModelsUtils::getEstagioPaeId($r),
    'numero_usp' => 'numero_usp',
    'nivel_programa' => fn($r) => Deparas::niveisPG[$r['nivel_programa']]
        ?? $r['nivel_programa'],
    'modalidade_pae' => 'modalidade_pae',
    'data_inicio_pae' => 'data_inicio_pae',
    'data_fim_pae' => 'data_fim_pae',
    'observacao' => 'observacao',
    'justificativa_cancelamento' => 'justificativa_cancelamento',
    'inscrito' => 'inscrito',
    'codigo_disciplina_estagio' => 'codigo_disciplina_estagio',
    'versao_disciplina_estagio' => 'versao_disciplina_estagio',
    'situacao_estagio' => fn($r) => Deparas::situacoesEstagioPAE[$r['situacao_estagio']]
        ?? $r['situacao_estagio'],
    'unidade_estagio' => 'unidade_estagio',
    'numero_usp_supervisor' => 'numero_usp_supervisor',
    'periodo_epp' => 'periodo_epp',
    'situacao_epp' => fn($r) => Deparas::situacoesEPP[$r['situacao_epp']] ?? $r['situacao_epp'],
    'modalidade_epp' => fn($r) => Deparas::modalidadesEPP[$r['modalidade_epp']] ?? $r['modalidade_epp'],
    'codigo_disciplina_epp' => 'codigo_disciplina_epp',
    'unidade_epp' => 'unidade_epp',
    'situacao_inscricao' => fn($r) => Deparas::situacoesInscricaoPAE[$r['situacao_inscricao']]
        ?? $r['situacao_inscricao'],
    'classificacao_bolsa' => 'classificacao_bolsa',
    'bolsista_ou_voluntario' => 'bolsista_ou_voluntario',
    'unidade_inscricao' => 'unidade_inscricao',
    'observacao2' => 'observacao2',
    'organizacao_disciplina_externa' => 'organizacao_disciplina_externa',
    'unidade_cota_interunidades' => 'unidade_cota_interunidades',
    'validacao_inscricao_orientador' => fn($r) => Deparas::validacaoPAE[$r['validacao_inscricao_orientador']]
        ?? $r['validacao_inscricao_orientador'],
    'validacao_inscricao_supervisor' => fn($r) => Deparas::validacaoPAE[$r['validacao_inscricao_supervisor']]
        ?? $r['validacao_inscricao_supervisor'],
    'validacao_inscricao_unidade' => 'validacao_inscricao_unidade',
    'validacao_inscricao_pro_reitoria' => 'validacao_inscricao_pro_reitoria',
    'vinculo_empregaticio' => fn($r) => Deparas::vinculoEmpregaticioPAE[$r['vinculo_empregaticio']]
        ?? $r['vinculo_empregaticio'],
];
