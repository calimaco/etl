<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\CEU\CoordenadorCCEx;
use Src\Loading\Models\CEU\CursoCulturaExtensao;
use Src\Loading\Models\CEU\InscricaoCCEx;
use Src\Loading\Models\CEU\MatriculaCCEx;
use Src\Loading\Models\CEU\MinistranteCCEx;
use Src\Loading\Models\CEU\OferecimentoCCEx;

return [
    "routine_name" => 'CEU',
    "schema_path" => 'Schemas/CEU',
    "temp_tables" => [
        'create_matriculasCCEX_temp',
        'create_inscricoesCCEX_temp',
    ],
    "loading_config" => [
        "coordenadores_ccex" => [
            "query_path" => "CEU/coordenadores_ccex",
            "mapping" => "CEU/coordenador_ccex_map",
            "model" => CoordenadorCCEx::class,
            "loader" => DefaultLoader::class,
            "load_type" => "full",
        ],
        "cursos_culturaextensao" => [
            "query_path" => "CEU/cursos_culturaextensao",
            "mapping" => "CEU/curso_cultura_extensao_map",
            "model" => CursoCulturaExtensao::class,
            "loader" => DefaultLoader::class,
            "load_type" => "full",
        ],
        "inscricoes_ccex" => [
            "query_path" => "CEU/inscricoes_ccex",
            "mapping" => "CEU/inscricao_ccex_map",
            "model" => InscricaoCCEx::class,
            "loader" => DefaultLoader::class,
            "load_type" => "paginated",
        ],
        "matriculas_ccex" => [
            "query_path" => "CEU/matriculas_ccex",
            "mapping" => "CEU/matricula_ccex_map",
            "model" => MatriculaCCEx::class,
            "loader" => DefaultLoader::class,
            "load_type" => "paginated",
        ],
        "ministrantes_ccex" => [
            "query_path" => "CEU/ministrantes_ccex",
            "mapping" => "CEU/ministrante_ccex_map",
            "model" => MinistranteCCEx::class,
            "loader" => DefaultLoader::class,
            "load_type" => "full",
        ],
        "oferecimentos_ccex" => [
            "query_path" => "CEU/oferecimentos_ccex",
            "mapping" => "CEU/oferecimento_ccex_map",
            "model" => OferecimentoCCEx::class,
            "loader" => DefaultLoader::class,
            "load_type" => "full",
        ],
    ]
];
