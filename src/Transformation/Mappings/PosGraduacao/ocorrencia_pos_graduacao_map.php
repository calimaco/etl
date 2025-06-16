<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'data_ocorrencia' => 'data_ocorrencia',
    'tipo_ocorrencia' => 'tipo_ocorrencia',
    'motivo_ocorrencia' => 'motivo_ocorrencia',
    'prazo_afastamento' => 'prazo_afastamento',
    'codigo_area_destino' => 'codigo_area_destino',
    'nome_area_destino' => 'nome_area_destino',
    'nivel_programa_destino' => fn($r) => Deparas::niveisPG[$r['nivel_programa_destino']]
        ?? $r['nivel_programa_destino'],
    'prorrogacao_def_solicitada_dias' => 'prorrogacao_def_solicitada_dias',
    'prorrogacao_def_obtida_dias' => 'prorrogacao_def_obtida_dias',
];
