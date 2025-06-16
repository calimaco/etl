<?php

use Src\Utils\ReplicadoModelsUtils;

return [
    'id_projeto_diverso' => fn($r) => ReplicadoModelsUtils::getProjetoDiversoId($r),
    'codigo_programa_usp' => 'codigo_programa_usp',
    'nome_programa_usp' => 'nome_programa_usp',
    'juno_projeto_programa_usp' => fn($r) => ($r['periodo_referencial'] . "-" . $r['codigo_projeto_diverso']),
    'codigo_colegiado' => 'codigo_colegiado',
    'sigla_colegiado' => 'sigla_colegiado',
    'situacao_projeto' => 'situacao_projeto',
    'data_inicio_previsto' => 'data_inicio_previsto',
    'data_fim_previsto' => 'data_fim_previsto',
    'numero_usp_coordenador' => 'numero_usp_coordenador',
    'numero_bolsas_solicitadas' => 'numero_bolsas_solicitadas',
    'numero_bolsas_aprovadas' => 'numero_bolsas_aprovadas',
    'numero_participantes_nao_bolsistas' => 'numero_participantes_nao_bolsistas',
    'titulo_projeto' => 'titulo_projeto',
    'prefixo_disciplina' => 'prefixo_disciplina',
    'codigo_disciplina' => 'codigo_disciplina',
    'valor_total_projeto' => 'valor_total_projeto',
    'vertente_pub' => 'vertente_pub',
    'caracteristica_projeto' => 'caracteristica_projeto',
];
