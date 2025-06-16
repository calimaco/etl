<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'numero_usp' => 'numero_usp',
    'id_turma' => fn($r) => ReplicadoModelsUtils::getTurmaPosGraduacaoId($r),
];
