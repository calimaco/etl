<?php

use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($r) => ReplicadoModelsUtils::getPesquisaAvancadaId($r),
    'sequencia_periodo' => 'sequencia_periodo',
    'sequencia_fomento' => 'sequencia_fomento',
    'codigo_fomento' => 'codigo_fomento',
    'nome_fomento' => fn($r) => CommonUtils::cleanInput($r['nome_fomento'], ['decode_html']),
    'data_inicio_fomento' => 'data_inicio_fomento',
    'data_fim_fomento' => 'data_fim_fomento',
    'id_fomento' => fn($r) => CommonUtils::cleanInput($r['id_fomento'], ['decode_html']),
];
