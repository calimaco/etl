<?php

use Src\Loading\Models\PesquisasAvancadas\AfastEmpresaPesquisaAvancada;
use Src\Loading\Models\PesquisasAvancadas\BolsaPesquisaAvancada;
use Src\Loading\Models\PesquisasAvancadas\PeriodoPesquisaAvancada;
use Src\Loading\Models\PesquisasAvancadas\PesquisaAvancada;
use Src\Loading\Models\PesquisasAvancadas\SupervisaoPesquisaAvancada;

return [
    "afastempresas_pesq_avancada" => [
        "query_path" => "PesquisasAvancadas/afastempresas_pesq_avancada",
        "model" => AfastEmpresaPesquisaAvancada::class,
        "load_type" => "full",
        "something" => "PesquisasAvancadas/AfastEmpresaPesquisaAvancadaReplicado"
    ],
    "bolsas_pesq_avancada" => [
        "query_path" => "PesquisasAvancadas/bolsas_pesq_avancada",
        "model" => BolsaPesquisaAvancada::class,
        "load_type" => "full",
        "something" => "PesquisasAvancadas/BolsaPesquisaAvancadaReplicado"
    ],
    "periodos_pesq_avancada" => [
        "query_path" => "PesquisasAvancadas/periodos_pesq_avancada",
        "model" => PeriodoPesquisaAvancada::class,
        "load_type" => "full",
        "something" => "PesquisasAvancadas/PeriodoPesquisaAvancadaReplicado"
    ],
    "pesquisas_avancadas" => [
        "query_path" => "PesquisasAvancadas/pesquisas_avancadas",
        "model" => PesquisaAvancada::class,
        "load_type" => "full",
        "something" => "PesquisasAvancadas/PesquisaAvancadaReplicado"
    ],
    "supervisoes_pesq_avancada" => [
        "query_path" => "PesquisasAvancadas/supervisoes_pesq_avancada",
        "model" => SupervisaoPesquisaAvancada::class,
        "load_type" => "full",
        "something" => "PesquisasAvancadas/SupervisaoPesquisaAvancadaReplicado"
    ],
];
