<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto' => fn($r) => ReplicadoModelsUtils::getPesquisaAvancadaId($r),
    'sequencia_periodo' => 'sequencia_periodo',
    'data_inicio_periodo' => 'data_inicio_periodo',
    'data_fim_periodo' => 'data_fim_periodo',
    'situacao_periodo' => fn($r) => Deparas::situacoesPD[$r['situacao_periodo']] ?? [$r['situacao_periodo']],
    'fonte_recurso' => 'fonte_recurso',
    'horas_semanais' => 'horas_semanais',
];
