<?php

use Uspdev\Replicado\Uteis;
use Src\Utils\TransformationUtils;

return [
    'numero_cnpq' => fn($r) => (int) $r['numero_cnpq'],
    'numero_usp' => 'numero_usp',
    'data_atualizacao_cv' => 'data_atualizacao_cv',
    'data_extracao_cv' => 'data_extracao_cv',
    // 'lattes' => fn($r) => $this->obterJson($record['xml_zipped'])
    // VER
];
