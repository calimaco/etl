<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\Servidor\DesignacaoServidor;
use Src\Loading\Models\Servidor\ProfessorVisitante;
use Src\Loading\Models\Servidor\VinculoServidor;

return [
    "routine_name" => 'Servidor',
    "schema_path" => 'Schemas/Servidor',
    "temp_tables" => ['create_vinculosServidores_temp'],
    "loading_config" => [
        "designacoes_servidores" => [
            "query_path" => "Servidor/designacoes_servidores",
            "model" => DesignacaoServidor::class,
            "load_type" => "full",
            "mapping" => "Servidor/designacao_servidor_map",
            "loader" => DefaultLoader::class,
        ],
        "professores_visitantes" => [
            "query_path" => "Servidor/professores_visitantes",
            "model" => ProfessorVisitante::class,
            "load_type" => "full",
            "mapping" => "Servidor/professor_visitante_map",
            "loader" => DefaultLoader::class,
        ],
        "vinculos_servidores" => [
            "query_path" => "Servidor/vinculos_servidores",
            "model" => VinculoServidor::class,
            "load_type" => "full",
            "mapping" => "Servidor/vinculo_servidor_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
