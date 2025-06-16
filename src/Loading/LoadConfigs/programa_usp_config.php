<?php

use Src\Loading\Models\ProgramaUSP\AuxilioConcedido;
use Src\Loading\Models\ProgramaUSP\BolsaDiversa;
use Src\Loading\Models\ProgramaUSP\InscricaoProjetoDiverso;
use Src\Loading\Models\ProgramaUSP\ProjetoDiverso;

return [
    "auxilios_concedidos" => [
        "query_path" => "ProgramaUSP/auxilios_concedidos",
        "model" => AuxilioConcedido::class,
        "load_type" => "full",
        "map" => "ProgramaUSP/auxilio_concedido_map"
    ],
    "bolsas_diversas" => [
        "query_path" => "ProgramaUSP/bolsas_diversas",
        "model" => BolsaDiversa::class,
        "load_type" => "full",
        "map" => "ProgramaUSP/bolsa_diversa_map"
    ],
    "inscricoes_projetos_diversos" => [
        "query_path" => "ProgramaUSP/inscricoes_projetos_diversos",
        "model" => InscricaoProjetoDiverso::class,
        "load_type" => "full",
        "map" => "ProgramaUSP/inscricao_projeto_diverso_map"
    ],
    "projetos_diversos" => [
        "query_path" => "ProgramaUSP/projetos_diversos",
        "model" => ProjetoDiverso::class,
        "load_type" => "full",
        "map" => "ProgramaUSP/projeto_diverso_map"
    ],
];
