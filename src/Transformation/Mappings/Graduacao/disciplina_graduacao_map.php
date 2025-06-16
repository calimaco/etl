<?php

use Src\Utils\Deparas;
use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_disciplina' => fn($r) => ReplicadoModelsUtils::getDisciplinaGraduacaoId($r),
    'codigo_disciplina' => 'codigo_disciplina',
    'versao_disciplina' => 'versao_disciplina',
    'nome_disciplina' => fn($r) => CommonUtils::cleanInput(
        $r['nome_disciplina'],
        ['trim_quotes']
    ),
    'situacao_disciplina' => fn($r) => Deparas::situacoesDisciplina[$r['situacao_disciplina']]
        ?? $r['situacao_disciplina'],
    'data_ativacao_disciplina' => 'data_ativacao_disciplina',
    'data_desativacao_disciplina' => 'data_desativacao_disciplina',
    'credito_aula' => 'credito_aula',
    'credito_trabalho' => 'credito_trabalho',
    'duracao_disciplina_semanas' => 'duracao_disciplina_semanas',
    'periodicidade_disciplina' => fn($r) => Deparas::periodicidadeDisciplina[$r['periodicidade_disciplina']]
        ?? $r['periodicidade_disciplina'],
    'carga_horaria_estagio' => 'carga_horaria_estagio',
    'carga_horaria_licenciatura' => 'carga_horaria_licenciatura',
    'carga_horaria_aacc' => 'carga_horaria_aacc',
];
