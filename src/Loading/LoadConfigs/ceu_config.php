<?php

use Src\Loading\Models\CEU\CoordenadorCCEx;
use Src\Loading\Models\CEU\CursoCulturaExtensao;
use Src\Loading\Models\CEU\InscricaoCCEx;
use Src\Loading\Models\CEU\MatriculaCCEx;
use Src\Loading\Models\CEU\MinistranteCCEx;
use Src\Loading\Models\CEU\OferecimentoCCEx;

return [
    "coordenadores_ccex" => [
        "query_path" => "CEU/coordenadores_ccex",
        "model" => CoordenadorCCEx::class,
        "load_type" => "full",
        "map" => "CEU/coordenador_ccex_map"
    ],
    "cursos_culturaextensao" => [
        "query_path" => "CEU/cursos_culturaextensao",
        "model" => CursoCulturaExtensao::class,
        "load_type" => "full",
        "map" => "CEU/curso_cultura_extensao_map"
    ],
    "inscricoes_ccex" => [
        "query_path" => "CEU/inscricoes_ccex",
        "model" => InscricaoCCEx::class,
        "load_type" => "paginated",
        "map" => "CEU/inscricao_ccex_map"
    ],
    "matriculas_ccex" => [
        "query_path" => "CEU/matriculas_ccex",
        "model" => MatriculaCCEx::class,
        "load_type" => "paginated",
        "map" => "CEU/matricula_ccex_map"
    ],
    "ministrantes_ccex" => [
        "query_path" => "CEU/ministrantes_ccex",
        "model" => MinistranteCCEx::class,
        "load_type" => "full",
        "map" => "CEU/ministrante_ccex_map"
    ],
    "oferecimentos_ccex" => [
        "query_path" => "CEU/oferecimentos_ccex",
        "model" => OferecimentoCCEx::class,
        "load_type" => "full",
        "map" => "CEU/oferecimento_ccex_map"
    ],
];
