<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\PesquisaAvancada\AfastEmpresaPesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\BolsaPesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\PeriodoPesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\PesquisaAvancada;
use Src\Loading\Models\PesquisaAvancada\SupervisaoPesquisaAvancada;

return [
    "routine_name" => 'PesquisaAvancada',
    "schema_path" => 'Schemas/PesquisaAvancada',
    "temp_tables" => ['create_supervisoesPD_temp'],
    "loading_config" => [
        "afastempresas_pesq_avancada" => [
            "query_path" => "PesquisaAvancada/afastempresas_pesq_avancada",
            "model" => AfastEmpresaPesquisaAvancada::class,
            "load_type" => "full",
            "mapping" => "PesquisaAvancada/afast_empresa_pesquisa_avancada_map",
            "loader" => DefaultLoader::class,
        ],
        "bolsas_pesq_avancada" => [
            "query_path" => "PesquisaAvancada/bolsas_pesq_avancada",
            "model" => BolsaPesquisaAvancada::class,
            "load_type" => "full",
            "mapping" => "PesquisaAvancada/bolsa_pesquisa_avancada_map",
            "loader" => DefaultLoader::class,
        ],
        "periodos_pesq_avancada" => [
            "query_path" => "PesquisaAvancada/periodos_pesq_avancada",
            "model" => PeriodoPesquisaAvancada::class,
            "load_type" => "full",
            "mapping" => "PesquisaAvancada/periodo_pesquisa_avancada_map",
            "loader" => DefaultLoader::class,
        ],
        "pesquisas_avancadas" => [
            "query_path" => "PesquisaAvancada/pesquisas_avancadas",
            "model" => PesquisaAvancada::class,
            "load_type" => "full",
            "mapping" => "PesquisaAvancada/pesquisa_avancada_map",
            "loader" => DefaultLoader::class,
        ],
        "supervisoes_pesq_avancada" => [
            "query_path" => "PesquisaAvancada/supervisoes_pesq_avancada",
            "model" => SupervisaoPesquisaAvancada::class,
            "load_type" => "full",
            "mapping" => "PesquisaAvancada/supervisao_pesquisa_avancada_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
