<?php

use Src\Loading\Loaders\LattesLoader;
use Src\Loading\Models\Lattes\Lattes;

return [
    "routine_name" => 'Lattes',
    "schema_path" => 'Schemas/Lattes',
    "temp_tables" => ['create_nuspsLattes_temp'],
    "loading_config" => [
        "lattes" => [
            "query_path" => "Lattes/lattes",
            "model" => Lattes::class,
            "load_type" => "full",
            "mapping" => "Lattes/lattes_map",
            "loader" => LattesLoader::class,
        ],
    ]
];
