<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_vinculo' => fn($r) => ReplicadoModelsUtils::getVinculoId($r),
    'data_inicio_designacao' => 'data_inicio_designacao',
    'data_fim_designacao' => 'data_fim_designacao',
    'codigo_setor_designacao' => 'codigo_setor_designacao',
    'nome_setor_designacao' => 'nome_setor_designacao',
    'nome_funcao' => 'nome_funcao',
    'tipo_designacao' => fn($r) => Deparas::tiposDesignacaoServidor[$r['tipo_designacao']]
        ?? $r['tipo_designacao'],
];
