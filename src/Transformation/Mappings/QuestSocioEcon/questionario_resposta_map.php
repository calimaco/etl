<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_graduacao' => fn($r) => ReplicadoModelsUtils::getGraduacaoId($r),
    'id_questao' => fn($r) => ReplicadoModelsUtils::getQuestaoId($r),
    'alternativa_escolhida' => 'alternativa_escolhida',
];
