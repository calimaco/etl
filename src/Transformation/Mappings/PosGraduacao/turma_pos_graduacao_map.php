<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_turma' => fn($r) => ReplicadoModelsUtils::getTurmaGraduacaoId($r),
    'id_disciplina' => fn($r) => ReplicadoModelsUtils::getDisciplinaPosGraduacaoId($r),
    'codigo_turma' => 'codigo_turma',
    'situacao_turma' => 'situacao_turma',
    'data_inicio_turma' => 'data_inicio_turma',
    'data_fim_turma' => 'data_fim_turma',
    'vagas_regulares' => 'vagas_regulares',
    'vagas_especiais' => 'vagas_especiais',
    'vagas_total' => 'vagas_total',
    'num_inscritos' => 'num_inscritos',
    'num_matriculas_deferidas' => 'num_matriculas_deferidas',
    'num_matriculas_indeferidas' => 'num_matriculas_indeferidas',
    'num_matriculas_canceladas' => 'num_matriculas_canceladas',
    'consolidacao_turma' => 'consolidacao_turma',
    'consolidacao_resultados' => 'consolidacao_resultados',
    'data_cancelamento' => 'data_cancelamento',
    'motivo_cancelamento' => 'motivo_cancelamento',
    'frequencia_media' => 'frequencia_media',
    'aprovacao_pct' => 'aprovacao_pct',
    'reprovacao_pct' => 'reprovacao_pct',
    'pendencia_pct' => 'pendencia_pct',
    'alunos_fflch_pct' => 'alunos_fflch_pct',
    'alunos_externos_pct' => 'alunos_externos_pct',
    'codigo_area' => 'codigo_area',
    'codigo_convenio' => 'codigo_convenio',
    'nivel_convenio' => fn($r) => Deparas::niveisPG[$r['nivel_convenio']]
        ?? $r['nivel_convenio'],
    'lingua_turma' => 'lingua_turma',
    'formato_oferecimento' => 'formato_oferecimento',
];
