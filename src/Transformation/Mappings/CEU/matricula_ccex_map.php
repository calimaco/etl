<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'codigo_matricula_ceu' => 'codigo_matricula_ceu',
    'numero_usp' => 'numero_usp',
    'codigo_oferecimento' => fn($r) => ReplicadoModelsUtils::getOferecimentoCCExId($r),
    'data_matricula' => 'data_matricula',
    'situacao_matricula' => fn($r) => Deparas::statusMatriculaCCEx[$r['situacao_matricula']]
        ?? $r['situacao_matricula'],
    'data_inicio_curso' => 'data_inicio_curso',
    'data_fim_curso' => 'data_fim_curso',
    'frequencia_aluno' => 'frequencia_aluno',
    'conceito_final_aluno' => fn($r) => Deparas::resultadoMatriculaCCEx[$r['conceito_final_aluno']]
        ?? $r['conceito_final_aluno'],
];
