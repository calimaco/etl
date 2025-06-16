<?php

use Src\Utils\Deparas;

return [
    'numero_usp' => 'numero_usp',
    'data_inicio_intercambio' => 'data_inicio_intercambio',
    'data_fim_intercambio' => 'data_fim_intercambio',
    'tipo_intercambio' => 'tipo_intercambio',
    'codigo_instituicao_origem' => 'codigo_instituicao_origem',
    'sigla_instituicao_origem' => 'sigla_instituicao_origem',
    'nome_instituicao_origem' => 'nome_instituicao_origem',
    'tipo_ingresso_intercambio' => fn($r) => Deparas::tiposIngressoIntercambio[$r['tipo_ingresso_intercambio']]
        ?? $r['tipo_ingresso_intercambio'],
    'nome_programa_intercambio' => 'nome_programa_intercambio',
    'nome_rede_intercambio' => 'nome_rede_intercambio',
    'responsavel_numero_usp' => 'responsavel_numero_usp',
    'responsavel_unidade' => 'responsavel_unidade',
    'responsavel_codigo_setor' => 'responsavel_codigo_setor',
    'responsavel_nome_setor' => 'responsavel_nome_setor',
];
