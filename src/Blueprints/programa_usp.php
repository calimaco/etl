<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\ProgramaUSP\AuxilioConcedido;
use Src\Loading\Models\ProgramaUSP\BolsaDiversa;
use Src\Loading\Models\ProgramaUSP\InscricaoProjetoDiverso;
use Src\Loading\Models\ProgramaUSP\ProjetoDiverso;

return [
    "routine_name" => 'ProgramaUSP',
    "schema_path" => 'Schemas/ProgramaUSP',
    "temp_tables" => [],
    "loading_config" => [
        "auxilios_concedidos" => [
            "query_path" => "ProgramaUSP/auxilios_concedidos",
            "model" => AuxilioConcedido::class,
            "load_type" => "full",
            "mapping" => "ProgramaUSP/auxilio_concedido_map",
            "loader" => DefaultLoader::class,
        ],
        "bolsas_diversas" => [
            "query_path" => "ProgramaUSP/bolsas_diversas",
            "model" => BolsaDiversa::class,
            "load_type" => "full",
            "mapping" => "ProgramaUSP/bolsa_diversa_map",
            "loader" => DefaultLoader::class,
        ],
        "inscricoes_projetos_diversos" => [
            "query_path" => "ProgramaUSP/inscricoes_projetos_diversos",
            "model" => InscricaoProjetoDiverso::class,
            "load_type" => "full",
            "mapping" => "ProgramaUSP/inscricao_projeto_diverso_map",
            "loader" => DefaultLoader::class,
        ],
        "projetos_diversos" => [
            "query_path" => "ProgramaUSP/projetos_diversos",
            "model" => ProjetoDiverso::class,
            "load_type" => "full",
            "mapping" => "ProgramaUSP/projeto_diverso_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
