<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'numero_usp' => 'numero_usp',
    'seq_programa' => 'seq_programa',
    'tipo_matricula' => fn($r) => Deparas::tiposMatriculaPG[$r['tipo_matricula']]
        ?? $r['tipo_matricula'],
    'nivel_programa' => fn($r) => Deparas::niveisPG[$r['nivel_programa']]
        ?? $r['nivel_programa'],
    'codigo_area' => 'codigo_area',
    'nome_area' => 'nome_area',
    'codigo_programa' => 'codigo_programa',
    'nome_programa' => 'nome_programa',
    'data_selecao' => 'data_selecao',
    'data_primeira_matricula' => 'data_primeira_matricula',
    'tipo_ultima_ocorrencia' => 'tipo_ultima_ocorrencia',
    'data_ultima_ocorrencia' => 'data_ultima_ocorrencia',
    'data_deposito_trabalho' => 'data_deposito_trabalho',
    'data_aprovacao_trabalho' => 'data_aprovacao_trabalho',
];
