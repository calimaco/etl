<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_participacao_banca' => fn($r) => ReplicadoModelsUtils::getParticipacaoBancaId($r),
    'id_defesa' => fn($r) => ReplicadoModelsUtils::getDefesaId($r),
    'numero_usp_membro' => 'numero_usp_membro',
    'vinculo_participacao' => fn($r) => Deparas::funcoesBanca[$r['vinculo_participacao']]
        ?? $r['vinculo_participacao'],
    'participacao_assinalada' => 'participacao_assinalada',
    // 'tipo_avaliacao' => fn($r) => $this->checkTipoAvaliacao($r['nota_defesa'], $r['avaliacao_defesa']),
    // VER
    'nota_defesa' => 'nota_defesa',
    'avaliacao_defesa' => 'avaliacao_defesa',
    'especialista' => 'especialista',
    // i.e. "não tem título acadêmico mas é reconhecido pelo conhecimento técnico"
    'avaliacao_escrita' => 'avaliacao_escrita',
    'voto_dupla_titulacao' => 'voto_dupla_titulacao',
];
