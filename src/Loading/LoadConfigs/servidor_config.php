<?php

use Src\Loading\Models\Servidor\DesignacaoServidor;
use Src\Loading\Models\Servidor\ProfessorVisitante;
use Src\Loading\Models\Servidor\VinculoServidor;

return [
    "designacoes_servidores" => [
        "query_path" => "Servidor/designacoes_servidores",
        "model" => DesignacaoServidor::class,
        "load_type" => "full",
        "map" => "Servidor/designacao_servidor_map"
    ],
    "professores_visitantes" => [
        "query_path" => "Servidor/professores_visitantes",
        "model" => ProfessorVisitante::class,
        "load_type" => "full",
        "map" => "Servidor/professor_visitante_map"
    ],
    "vinculos_servidores" => [
        "query_path" => "Servidor/vinculos_servidores",
        "model" => VinculoServidor::class,
        "load_type" => "full",
        "map" => "Servidor/vinculo_servidor_map"
    ],
];
