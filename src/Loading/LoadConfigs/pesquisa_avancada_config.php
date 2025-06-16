<?php

use Src\Loading\Models\PesquisaAvancada\AfastEmpresaPesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\BolsaPesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\PeriodoPesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\PesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\SupervisaoPesquisaAvancada;

return [
    "afastempresas_pesq_avancada" => [
        "query_path" => "PesquisaAvancada/afastempresas_pesq_avancada",
        "model" => AfastEmpresaPesquisaAvancada::class,
        "load_type" => "full",
        "map" => "PesquisaAvancada/afast_empresa_pesquisa_avancada_map"
    ],
    "bolsas_pesq_avancada" => [
        "query_path" => "PesquisaAvancada/bolsas_pesq_avancada",
        "model" => BolsaPesquisaAvancada::class,
        "load_type" => "full",
        "map" => "PesquisaAvancada/bolsa_pesquisa_avancada_map"
    ],
    "periodos_pesq_avancada" => [
        "query_path" => "PesquisaAvancada/periodos_pesq_avancada",
        "model" => PeriodoPesquisaAvancada::class,
        "load_type" => "full",
        "map" => "PesquisaAvancada/periodo_pesquisa_avancada_map"
    ],
    "pesquisas_avancadas" => [
        "query_path" => "PesquisaAvancada/pesquisas_avancadas",
        "model" => PesquisaAvancada::class,
        "load_type" => "full",
        "map" => "PesquisaAvancada/pesquisa_avancada_map"
    ],
    "supervisoes_pesq_avancada" => [
        "query_path" => "PesquisaAvancada/supervisoes_pesq_avancada",
        "model" => SupervisaoPesquisaAvancada::class,
        "load_type" => "full",
        "map" => "PesquisaAvancada/supervisao_pesquisa_avancada_map"
    ],
];
