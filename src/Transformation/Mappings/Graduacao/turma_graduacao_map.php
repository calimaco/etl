<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_turma' => fn($r) => ReplicadoModelsUtils::getTurmaGraduacaoId($r),
    'id_disciplina' => fn($r) => ReplicadoModelsUtils::getDisciplinaGraduacaoId($r),
    'codigo_turma' => 'codigo_turma',
    'tipo_turma' => 'tipo_turma',
    'data_criacao_turma' => 'data_criacao_turma',
    'data_inicio_turma' => 'data_inicio_turma',
    'data_fim_turma' => 'data_fim_turma',
    'situacao_turma' => fn($r) => Deparas::statusTurma[$r['situacao_turma']] ?? $r['situacao_turma'],
    'carga_horaria_teorica' => 'carga_horaria_teorica',
    'carga_horaria_pratica' => 'carga_horaria_pratica',
    'numero_alunos_inicial' => 'numero_alunos_inicial',
    'trancamentos_pct' => fn($r) => round($r['trancamentos_pct'], 1),
    'numero_alunos_final' => 'numero_alunos_final',
    'pendencia_pct' => fn($r) => round($r['pendencia_pct'], 1),
    'recuperacao_pct' => fn($r) => round($r['recuperacao_pct'], 1),
    'aprovacao_pct' => fn($r) => round($r['aprovacao_pct'], 1),
    'reprov_nota_pct' => fn($r) => round($r['reprov_nota_pct'], 1),
    'reprov_freq_pct' => fn($r) => round($r['reprov_freq_pct'], 1),
    'reprov_ambos_pct' => fn($r) => round($r['reprov_ambos_pct'], 1),
    'frequencia_media' => fn($r) => round($r['frequencia_media'], 1),
    'nota_media' => fn($r) => round($r['nota_media'], 1),
];
