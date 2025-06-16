<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'codigo_oferecimento' => fn($r) => ReplicadoModelsUtils::getOferecimentoCCExId($r),
    'numero_ceu' => 'numero_ceu',
    'data_inscricao' => 'data_inscricao',
    'situacao_inscricao' => fn($r) => Deparas::situacoesInscricaoCCEx[$r['situacao_inscricao']]
        ?? $r['situacao_inscricao'],
    'origem_inscricao' => fn($r) => Deparas::origensInscricaoCCex[$r['origem_inscricao']]
        ?? $r['origem_inscricao'],
];
