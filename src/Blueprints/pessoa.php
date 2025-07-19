<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\Pessoa\Pessoa;
use Src\Loading\Models\Pessoa\TituloPessoa;

return [
    "routine_name" => 'Pessoa',
    "schema_path" => 'Schemas/Pessoa',
    "temp_tables" => ['create_titulos_temp'],
    "loading_config" => [
        "pessoas" => [
            "query_path" => "Pessoa/pessoas",
            "model" => Pessoa::class,
            "load_type" => "full",
            "mapping" => "Pessoa/pessoa_map",
            "loader" => DefaultLoader::class,
        ],
        "titulos_pessoas" => [
            "query_path" => "Pessoa/titulos_pessoas",
            "model" => TituloPessoa::class,
            "load_type" => "full",
            "mapping" => "Pessoa/titulo_pessoa_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
