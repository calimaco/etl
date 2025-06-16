<?php

use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_defesa' => fn($r) => ReplicadoModelsUtils::getDefesaId($r),
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'data_defesa' => 'data_defesa',
    'local_defesa' => fn($r) => CommonUtils::cleanInput(
        $r['local_defesa'],
        ['decode_html']
    ),
    'mencao_honrosa' => 'mencao_honrosa',
    'titulo_trabalho' => fn($r) => CommonUtils::cleanInput(
        $r['titulo_trabalho'],
        [
            'decode_html',
            'remove_trailing_periods',
            'trim_quotes',
            'to_uppercase'
        ]
    ),
];
