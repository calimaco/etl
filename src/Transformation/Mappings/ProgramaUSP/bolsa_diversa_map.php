<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_bolsa_diversa' => fn($r) => ReplicadoModelsUtils::getBolsaDiversaId($r),
    'codigo_programa_usp' => 'codigo_programa_usp',
    'nome_programa_usp' => 'nome_programa_usp',
    'numero_usp' => 'numero_usp',
    'situacao_bolsa' => 'situacao_bolsa',
    'data_inicio_bolsa' => 'data_inicio_bolsa',
    'data_fim_bolsa' => 'data_fim_bolsa',
    'justificativa_cancelamento_bolsa' => 'justificativa_cancelamento_bolsa',
    'tipo_vinculo_bolsista' => 'tipo_vinculo_bolsista',
    // 'id_graduacao_bolsista' => fn($r) => $this->getIdIfGraduacao($r),
    // VER
    'nivel_pg_bolsista' => 'nivel_pg_bolsista',
    // 'id_inscricao_projeto' => fn($r) => $this->getIdIfProjeto($r),
    // VER
    'valor_bolsa_especifico' => 'valor_bolsa_especifico',
    'fonte_pagadora_usp' => fn($r) => Deparas::nToNull($r['fonte_pagadora_usp']),
    'parte_papfe' => fn($r) => Deparas::nToNull($r['parte_papfe']),
    'exige_avaliacao_socioeconomica' => fn($r) => Deparas::nToNull($r['exige_avaliacao_socioeconomica']),
];
