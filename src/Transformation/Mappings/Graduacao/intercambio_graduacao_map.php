<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_graduacao' => fn($r) => ReplicadoModelsUtils::getGraduacaoId($r),
    'numero_usp' => 'numero_usp',
    'modalidade_intercambio' => fn($r) => Deparas::modalidadesIntercambio[$r['modalidade_intercambio']]
        ?? $r['modalidade_intercambio'],
    'data_inicio_intercambio' => 'data_inicio_intercambio',
    'data_fim_intercambio' => 'data_fim_intercambio',
    'situacao_intercambio' => 'situacao_intercambio',
    'data_desistencia' => 'data_desistencia',
    'houve_prorrogacao' => 'houve_prorrogacao',
    'codigo_instituicao' => 'codigo_instituicao',
    'sigla_instituicao' => 'sigla_instituicao',
    'nome_instituicao' => 'nome_instituicao',
    'tipo_ingresso_intercambio' => fn($r) => Deparas::tiposIngressoIntercambio[$r['tipo_ingresso_intercambio']]
        ?? $r['tipo_ingresso_intercambio'],
    'codigo_edital_intercambio' => 'codigo_edital_intercambio',
    'nome_programa_intercambio' => 'nome_programa_intercambio',
    'nome_rede_intercambio' => 'nome_rede_intercambio',
];
