<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\PosGraduacao\BancaPosGraduacao;
use Src\Loading\Models\PosGraduacao\BolsaPosGraduacao;
use Src\Loading\Models\PosGraduacao\CoordenadorPosGraduacao;
use Src\Loading\Models\PosGraduacao\CredenciamentoPG;
use Src\Loading\Models\PosGraduacao\DefesaPosGraduacao;
use Src\Loading\Models\PosGraduacao\DisciplinaPosGraduacao;
use Src\Loading\Models\PosGraduacao\EstagioPae;
use Src\Loading\Models\PosGraduacao\MinistrantePosGraduacao;
use Src\Loading\Models\PosGraduacao\OcorrenciaPosGraduacao;
use Src\Loading\Models\PosGraduacao\OrientacaoPosGraduacao;
use Src\Loading\Models\PosGraduacao\PosGraduacao;
use Src\Loading\Models\PosGraduacao\PosGraduacaoConveniada;
use Src\Loading\Models\PosGraduacao\ProficienciaIdiomaPG;
use Src\Loading\Models\PosGraduacao\TurmaPosGraduacao;

return [
    "routine_name" => 'PosGraduacao',
    "schema_path" => 'Schemas/PosGraduacao',
    "temp_tables" => [
        'create_areas_programas_hotfix',
        'create_posgrad_temp',
        'create_orientacoesPG_temp',
        'create_disciplinasPG_temp',
        'create_turmasPG_temp',
        'create_ocorrenciasPG_temp',
        'create_credenciamentos_temp',
    ],
    "loading_config" => [
        "bancas_posgraduacao" => [
            "query_path" => "PosGraduacao/bancas_posgraduacao",
            "model" => BancaPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/banca_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "bolsas_posgraduacao" => [
            "query_path" => "PosGraduacao/bolsas_posgraduacao",
            "model" => BolsaPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/bolsa_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "coordenadores_posgraduacao" => [
            "query_path" => "PosGraduacao/coordenadores_posgraduacao",
            "model" => CoordenadorPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/coordenador_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "credenciamentos_pg" => [
            "query_path" => "PosGraduacao/credenciamentos_pg",
            "model" => CredenciamentoPG::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/credenciamento_pg_map",
            "loader" => DefaultLoader::class,
        ],
        "defesas_posgraduacao" => [
            "query_path" => "PosGraduacao/defesas_posgraduacao",
            "model" => DefesaPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/defesa_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "disciplinas_posgraduacao" => [
            "query_path" => "PosGraduacao/disciplinas_posgraduacao",
            "model" => DisciplinaPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/disciplina_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "estagios_pae" => [
            "query_path" => "PosGraduacao/estagios_pae",
            "model" => EstagioPae::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/estagio_pae_map",
            "loader" => DefaultLoader::class,
        ],
        "ministrantes_posgraduacao" => [
            "query_path" => "PosGraduacao/ministrantes_posgraduacao",
            "model" => MinistrantePosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/ministrante_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "ocorrencias_posgraduacao" => [
            "query_path" => "PosGraduacao/ocorrencias_posgraduacao",
            "model" => OcorrenciaPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/ocorrencia_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "orientacoes_posgraduacao" => [
            "query_path" => "PosGraduacao/orientacoes_posgraduacao",
            "model" => OrientacaoPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/orientacao_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "posgraduacoes_conveniadas" => [
            "query_path" => "PosGraduacao/posgraduacoes_conveniadas",
            "model" => PosGraduacaoConveniada::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/pos_graduacao_conveniada_map",
            "loader" => DefaultLoader::class,
        ],
        "posgraduacoes" => [
            "query_path" => "PosGraduacao/posgraduacoes",
            "model" => PosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "proficiencia_idiomas_pg" => [
            "query_path" => "PosGraduacao/proficiencia_idiomas_pg",
            "model" => ProficienciaIdiomaPG::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/proficiencia_idioma_pg_map",
            "loader" => DefaultLoader::class,
        ],
        "turmas_posgraduacao" => [
            "query_path" => "PosGraduacao/turmas_posgraduacao",
            "model" => TurmaPosGraduacao::class,
            "load_type" => "full",
            "mapping" => "PosGraduacao/turma_pos_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
