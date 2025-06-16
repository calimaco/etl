<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_graduacao' => fn($r) => ReplicadoModelsUtils::getGraduacaoId($r),
    'data_registro_inicio_tranc' => 'data_registro_inicio_tranc',
    'periodo_inicio_trancamento' => 'periodo_inicio_trancamento',
    'data_registro_fim_tranc' => 'data_registro_fim_tranc',
    'periodo_fim_trancamento' => 'periodo_fim_trancamento',
    'semestres_trancados' => 'semestres_trancados',
    'sequencia_trancamento' => 'sequencia_trancamento',
];
