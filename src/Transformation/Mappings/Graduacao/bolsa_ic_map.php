<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($r) => ReplicadoModelsUtils::getICId($r),
    'sequencia_fomento' => 'sequencia_fomento',
    'nome_fomento' => 'nome_fomento',
    'fomento_edital' => 'fomento_edital',
    'data_inicio_fomento' => 'data_inicio_fomento',
    'data_fim_fomento' => 'data_fim_fomento',
];
