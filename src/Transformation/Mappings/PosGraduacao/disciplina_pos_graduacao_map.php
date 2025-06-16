<?php

use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_disciplina' => fn($r) => ReplicadoModelsUtils::getDisciplinaPosGraduacaoId($r),
    'codigo_disciplina' => 'codigo_disciplina',
    'versao_disciplina' => 'versao_disciplina',
    'departamento' => 'departamento',
    'nome_disciplina' => fn($r) => CommonUtils::cleanInput(
        $r['nome_disciplina'],
        ['trim_quotes']
    ),
    'tipo_curso' => 'tipo_curso',
    'situacao_disciplina' => 'situacao_disciplina',
    'data_proposicao_disciplina' => 'data_proposicao_disciplina',
    'data_ativacao_disciplina' => 'data_ativacao_disciplina',
    'data_desativacao_disciplina' => 'data_desativacao_disciplina',
    'codigo_area' => 'codigo_area',
    'nome_area' => 'nome_area',
    'codigo_programa' => 'codigo_programa',
    'nome_programa' => 'nome_programa',
    'duracao_disciplina_semanas' => 'duracao_disciplina_semanas',
    'carga_horaria_teorica' => 'carga_horaria_teorica',
    'carga_horaria_pratica' => 'carga_horaria_pratica',
    'carga_horaria_estudo' => 'carga_horaria_estudo',
    'carga_horaria_total' => 'carga_horaria_total',
    'total_creditos' => 'total_creditos',
    'formato_disciplina' => 'formato_disciplina',
];
