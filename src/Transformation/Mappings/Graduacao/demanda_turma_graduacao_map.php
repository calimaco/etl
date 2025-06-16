<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_turma' => fn($r) => ReplicadoModelsUtils::getTurmaGraduacaoId($r),
    'vagas_total' => 'vagas_total',
    'inscritos_total' => 'inscritos_total',
    'matriculados_total' => 'matriculados_total',
    'vagas_tipo_obrigatoria' => 'vagas_tipo_obrigatoria',
    'inscritos_tipo_obrigatoria' => 'inscritos_tipo_obrigatoria',
    'matriculados_tipo_obrigatoria' => 'matriculados_tipo_obrigatoria',
    'vagas_tipo_opt_eletiva' => 'vagas_tipo_opt_eletiva',
    'inscritos_tipo_opt_eletiva' => 'inscritos_tipo_opt_eletiva',
    'matriculados_tipo_opt_eletiva' => 'matriculados_tipo_opt_eletiva',
    'vagas_tipo_opt_livre' => 'vagas_tipo_opt_livre',
    'inscritos_tipo_opt_livre' => 'inscritos_tipo_opt_livre',
    'matriculados_tipo_opt_livre' => 'matriculados_tipo_opt_livre',
    'vagas_tipo_extracurricular' => 'vagas_tipo_extracurricular',
    'inscritos_tipo_extracurricular' => 'inscritos_tipo_extracurricular',
    'matriculados_tipo_extracurricular' => 'matriculados_tipo_extracurricular',
    'vagas_tipo_especial' => 'vagas_tipo_especial',
    'inscritos_tipo_especial' => 'inscritos_tipo_especial',
    'matriculados_tipo_especial' => 'matriculados_tipo_especial',
];
