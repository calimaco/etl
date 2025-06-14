<?php

use Src\Utils\CommonUtils;
use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($r) => ReplicadoModelsUtils::getPesquisaAvancadaId($r),
    'sequencia_periodo' => 'sequencia_periodo',
    'seq_vinculo_empresa' => 'seq_vinculo_empresa',
    'nome_empresa' => fn($r) => CommonUtils::cleanInput($r['nome_empresa'], ['decode_html']),
    'data_inicio_afastamento' => 'data_inicio_afastamento',
    'data_fim_afastamento' => 'data_fim_afastamento',
    'tipo_vinculo' => fn($r) => Deparas::tiposVinculoPD[$r['tipo_vinculo']] ?? $r['tipo_vinculo'],
];
