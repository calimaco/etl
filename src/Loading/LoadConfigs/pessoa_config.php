<?php

use Src\Loading\Models\Pessoa\Pessoa;
use Src\Loading\Models\Pessoa\TituloPessoa;

return [
    "pessoas" => [
        "query_path" => "Pessoa/pessoas",
        "model" => Pessoa::class,
        "load_type" => "full",
        "map" => "Pessoa/pessoa_map"
    ],
    "titulos_pessoas" => [
        "query_path" => "Pessoa/titulos_pessoas",
        "model" => TituloPessoa::class,
        "load_type" => "full",
        "map" => "Pessoa/titulo_pessoa_map"
    ],
];
