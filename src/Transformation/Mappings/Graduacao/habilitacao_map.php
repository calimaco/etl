<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_graduacao' => fn($r) => ReplicadoModelsUtils::getGraduacaoId($r),
    'codigo_curso' => 'codigo_curso',
    'codigo_habilitacao' => fn($r) => (int)$r['codigo_habilitacao'],
    'nome_habilitacao' => 'nome_habilitacao',
    'tipo_habilitacao' => fn($r) => Deparas::tiposHabilitacao[$r['tipo_habilitacao']]
        ?? $r['tipo_habilitacao'],
    'periodo_habilitacao' => 'periodo_habilitacao',
    'data_inicio_habilitacao' => 'data_inicio_habilitacao',
    'data_fim_habilitacao' => 'data_fim_habilitacao',
    'tipo_encerramento' => 'tipo_encerramento',
    'data_colacao_grau' => 'data_colacao_grau',
    'data_expedicao_diploma' => 'data_expedicao_diploma',
];
