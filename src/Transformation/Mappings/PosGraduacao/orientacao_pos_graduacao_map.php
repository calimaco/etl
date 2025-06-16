<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'numero_usp_orientador' => 'numero_usp_orientador',
    'sequencia_orientacao' => 'sequencia_orientacao',
    'tipo_orientacao' => fn($r) => Deparas::tiposOrientacaoPG[$r['tipo_orientacao']]
        ?? $r['tipo_orientacao'],
    'data_inicio_orientacao' => 'data_inicio_orientacao',
    'data_fim_orientacao' => 'data_fim_orientacao',
    'ultimo_orientador' => 'ultimo_orientador',

    /* A orientação específica é a escolhida pelo(a) estudante para cadastro de de doutor(a) 
            não credenciado(a) junto ao Programa no qual o(a) aluno(a) está matriculado(a) */
    'orientacao_especifica' => 'orientacao_especifica',
    'data_conversao_para_plena' => 'data_conversao_para_plena',
    'data_conversao_para_especifica' => 'data_conversao_para_especifica',
];
