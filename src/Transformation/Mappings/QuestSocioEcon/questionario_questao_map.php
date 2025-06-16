<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_questao' => fn($r) => ReplicadoModelsUtils::getQuestaoId($r),
    'descricao_questao' => 'descricao_questao',
    'codigo_alternativa' => 'codigo_alternativa',
    'descricao_alternativa' => 'descricao_alternativa',
];
