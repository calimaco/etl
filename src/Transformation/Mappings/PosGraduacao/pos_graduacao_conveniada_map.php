<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'codigo_convenio' => 'codigo_convenio',
    'sigla_convenio' => 'sigla_convenio',
    'nome_convenio' => 'nome_convenio',
];
