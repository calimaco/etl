<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_concessao_auxilio' => fn($r) => ReplicadoModelsUtils::getAuxilioId($r),
    'codigo_auxilio' => 'codigo_auxilio',
    'nome_auxilio' => 'nome_auxilio',
    'numero_usp' => 'numero_usp',
    'data_inicio_auxilio' => 'data_inicio_auxilio',
    'data_fim_auxilio' => 'data_fim_auxilio',
    'situacao_auxilio' => 'situacao_auxilio',
    'justificativa_cancelamento_auxilio' => 'justificativa_cancelamento_auxilio',
    'tipo_vinculo_beneficiario' => 'tipo_vinculo_beneficiario',
    // 'id_graduacao_beneficiario' => fn($r) => $this->getIdIfGraduacao($r),
    // VER
    'nivel_pg_beneficiario' => fn($r) => Deparas::niveisPG[$r['nivel_pg_beneficiario']]
        ?? $r['nivel_pg_beneficiario'],
    'cota_mensal_prevista' => 'cota_mensal_prevista',
    'valor_auxilio_especifico' => 'valor_auxilio_especifico',
    'fonte_pagadora_usp' => fn($r) => Deparas::nToNull($r['fonte_pagadora_usp']),
    'parte_papfe' => fn($r) => Deparas::nToNull($r['parte_papfe']),
    'exige_avaliacao_socioeconomica' => fn($r) => Deparas::nToNull($r['exige_avaliacao_socioeconomica']),
];
