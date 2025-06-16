<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'idioma' => 'idioma',
    'data_exame' => 'data_exame',
];
