<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_credenciamento' => fn($r) => ReplicadoModelsUtils::getCredenciamentoId($r),
    'numero_usp' => 'numero_usp',
    'codigo_area' => 'codigo_area',
    'nome_area' => 'nome_area',
    'codigo_programa' => 'codigo_programa',
    'nome_programa' => 'nome_programa',
    'nivel_credenciamento' => fn($r) => Deparas::niveisPG[$r['nivel_credenciamento']]
        ?? $r['nivel_credenciamento'],
    'tipo_credenciamento' => fn($r) => Deparas::tipoCredenciamento[$r['tipo_credenciamento']]
        ?? $r['tipo_credenciamento'],
    // 'situacao_credenciamento' => fn($r) => $this->checkCredenciamento($r['data_fim_validade']),
    // VER
    'data_inicio_validade' => 'data_inicio_validade',
    'data_fim_validade' => 'data_fim_validade',
    'ultimo_credenciamento_area' => 'ultimo_credenciamento_area',
];
