<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($r) => ReplicadoModelsUtils::getPesquisaAvancadaId($r),
    'sequencia_supervisao' => 'sequencia_supervisao',
    'numero_usp_supervisor' => 'numero_usp_supervisor',
    'tipo_supervisao' => 'tipo_supervisao',
    'data_inicio_supervisao' => 'data_inicio_supervisao',
    'data_fim_supervisao' => 'data_fim_supervisao',
    'ultimo_supervisor_resp' => 'ultimo_supervisor_resp',
];
