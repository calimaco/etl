<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'numero_usp' => 'numero_usp',
    'codigo_oferecimento' => fn($r) => ReplicadoModelsUtils::getOferecimentoCCExId($r),
    'turma' => 'turma',
    'funcao' => 'funcao',
    'forma_exercicio' => fn($r) => Deparas::formasExercicioCEU[$r['forma_exercicio']]
        ?? $r['forma_exercicio'],
    'carga_horaria_horas' => 'carga_horaria_horas',
    'data_inicio_turma' => 'data_inicio_turma',
    'data_fim_turma' => 'data_fim_turma',
];
