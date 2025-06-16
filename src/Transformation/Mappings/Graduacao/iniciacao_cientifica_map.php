<?php

use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($r) => ReplicadoModelsUtils::getICId($r),
    'numero_usp' => fn($r) => !is_null($r['numero_usp'])
        ? (int) $r['numero_usp']
        : NULL,
    'data_inicio_projeto' => 'data_inicio_projeto',
    'data_fim_projeto' => 'data_fim_projeto',
    'situacao_projeto' => 'situacao_projeto',
    // 'situacao_projeto' => fn($r) => $this->checkStatus(
    //     $r['situacao_projeto'],
    //     $r['data_fim_projeto']
    // ),
    // VER
    'codigo_departamento' => fn($r) => (int) $r['codigo_departamento'],
    'nome_departamento' => 'nome_departamento',
    'ano_projeto' => 'ano_projeto',
    'numero_usp_orientador' => fn($r) => (int) $r['numero_usp_orientador'],
    'titulo_projeto' => fn($r) => CommonUtils::cleanInput(
        $r['titulo_projeto'],
        [
            'decode_html',
            'remove_trailing_periods',
            'trim_quotes',
            'to_uppercase'
        ]
    ),
    'palavras_chave' => fn($r) => CommonUtils::cleanInput(
        $r['palavras_chave'],
        [
            'decode_html',
            'remove_trailing_periods',
            'trim_quotes',
            'to_uppercase'
        ]
    ),
];
