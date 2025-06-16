<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_graduacao' => fn($r) => ReplicadoModelsUtils::getGraduacaoId($r),
    'codigo_prova' => 'codigo_prova',
    'descricao_prova' => 'descricao_prova',
    'pontos_obtidos' => 'pontos_obtidos',
    'pontos_maximo' => 'pontos_maximo',
];
