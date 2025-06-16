<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_graduacao' => fn($r) => ReplicadoModelsUtils::getGraduacaoId($r),
    'numero_usp' => fn($r) => (int)$r['numero_usp'],
    'sequencia_grad' => fn($r) => (int)$r['sequencia_grad'],
    'situacao_curso' => fn($r) => Deparas::situacoesGR[$r['situacao_curso']]
        ?? $r['situacao_curso'],
    'data_inicio_vinculo' => 'data_inicio_vinculo',
    'data_fim_vinculo' => 'data_fim_vinculo',
    'codigo_curso' => fn($r) => (int)$r['codigo_curso'],
    'nome_curso' => 'nome_curso',
    'tipo_ingresso' => fn($r) => Deparas::ingressos[$r['tipo_ingresso']]
        ?? $r['tipo_ingresso'],
    'categoria_ingresso' => 'categoria_ingresso',
    'rank_ingresso' => 'rank_ingresso',
    'bacharelado' => 'bacharelado',
    'tipo_encerramento_bacharelado' => 'tipo_encerramento_bacharelado',
    'data_encerramento_bacharelado' => 'data_encerramento_bacharelado',
    'licenciatura' => 'licenciatura',
    'tipo_encerramento_licenciatura' => 'tipo_encerramento_licenciatura',
    'data_encerramento_licenciatura' => 'data_encerramento_licenciatura',
];
