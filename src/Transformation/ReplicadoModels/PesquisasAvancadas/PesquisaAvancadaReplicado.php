<?php

use Src\Utils\CommonUtils;
use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($v) => ReplicadoModelsUtils::getPesquisaAvancadaId($v),
    'modalidade' => fn($v) => Deparas::modalidadesPD[$v['codigo_modalidade']] ?? 'XX',
    'numero_usp' => 'numero_usp',
    'situacao_projeto' => 'situacao_projeto',
    'data_inicio_projeto' => 'data_inicio_projeto',
    'data_fim_projeto' => 'data_fim_projeto',
    'motivo_cancelamento' => 'motivo_cancelamento',
    'descricao_cancelamento' => 'descricao_cancelamento',
    'codigo_departamento' => 'codigo_departamento',
    'nome_departamento' => 'nome_departamento',
    'titulo_projeto' => fn($v) => CommonUtils::cleanInput(
        $v['titulo_projeto'],
        [
            'decode_html',
            'remove_trailing_periods',
            'trim_quotes',
            'to_uppercase'
        ]
    ),
    'area_cnpq' => 'area_cnpq',
    'palavras_chave' => '-'
    // $this->palavrasChave(
    // array(
    // $record['palcha_1'],
    // $record['palcha_2'],
    // $record['palcha_3']
    // )
    // ),
];
