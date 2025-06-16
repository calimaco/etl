<?php

use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_trabalho' => fn($r) => ReplicadoModelsUtils::getSiicuspTrabalhoId($r),
    'titulo_trabalho' => fn($r) => CommonUtils::cleanInput(
        $r['titulo_trabalho'],
        [
            'decode_html',
            'remove_trailing_periods',
            'trim_quotes',
            'to_uppercase'
        ]
    ),
    'id_projeto_ic' => fn($r) => isset($r['codigo_projeto'])
        ? ReplicadoModelsUtils::getICId($r)
        : null,
    'edicao_siicusp' => 'edicao_siicusp',
    'situacao_inscricao' => 'situacao_inscricao',
    // 'situacao_apresentacao' => fn($r) => $this->checkSituacaoApresentacao(
    //     $r['apresentado_siicusp'],
    //     $r['tipo_participante_apresentou']
    // ),
    // VER
    'prox_etapa_recomendado' => 'prox_etapa_recomendado',
    'prox_etapa_apresentado' => 'prox_etapa_apresentado',
    'mencao_honrosa' => 'mencao_honrosa',
    'codigo_dpto_orientador' => 'codigo_dpto_orientador',
    'nome_dpto_orientador' => 'nome_dpto_orientador',
];
