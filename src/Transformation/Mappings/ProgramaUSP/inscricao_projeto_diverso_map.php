<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_inscricao_projeto' => fn($r) => ReplicadoModelsUtils::getInscricaoProjetoDivId($r),
    'id_projeto_diverso' => fn($r) => ReplicadoModelsUtils::getProjetoDiversoId($r),
    'numero_usp' => 'numero_usp',
    'tipo_vinculo_inscrito' => 'tipo_vinculo_inscrito',
    'data_inscricao_projeto' => 'data_inscricao_projeto',
    'inscricao_selecionada' => 'inscricao_selecionada',
    'data_selecao_rejeicao' => 'data_selecao_rejeicao',
    'selecionado_docente_outro_projeto' => 'selecionado_docente_outro_projeto',
    'comparecimento_entrevista' => 'comparecimento_entrevista',
    'cursou_disciplina' => 'cursou_disciplina',
    'status_aceite_aluno' => 'status_aceite_aluno',
    'data_aceite_aluno' => 'data_aceite_aluno',
    'status_aceite_docente' => 'status_aceite_docente',
    'data_aceite_docente' => 'data_aceite_docente',
    'data_solicitacao_desligamento' => 'data_solicitacao_desligamento',
    'codigo_motivo_solicitacao_desligamento' => 'codigo_motivo_solicitacao_desligamento',
    'motivo_desligamento' => 'motivo_desligamento',
    'motivo_desligamento_solicitacao_outro' => 'motivo_desligamento_solicitacao_outro',
    'status_resultado_solicitacao_desligamento' => 'status_resultado_solicitacao_desligamento',
    'data_resultado_solicitacao_desligamento' => 'data_resultado_solicitacao_desligamento',
    'data_envio_relatorio_final' => 'data_envio_relatorio_final',
    'solicitou_substituicao' => 'solicitou_substituicao',
    'numero_usp_substituto' => 'numero_usp_substituto',
    'bolsista_ou_voluntario' => 'bolsista_ou_voluntario',
];
