<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\Graduacao\BolsaIC;
use Src\Loading\Models\Graduacao\DemandaTurmaGraduacao;
use Src\Loading\Models\Graduacao\DisciplinaGraduacao;
use Src\Loading\Models\Graduacao\Graduacao;
use Src\Loading\Models\Graduacao\Habilitacao;
use Src\Loading\Models\Graduacao\IniciacaoCientifica;
use Src\Loading\Models\Graduacao\IntercambioGraduacao;
use Src\Loading\Models\Graduacao\MinistranteGraduacao;
use Src\Loading\Models\Graduacao\NotasIngressoGraduacao;
use Src\Loading\Models\Graduacao\SIICUSPParticipante;
use Src\Loading\Models\Graduacao\SIICUSPTrabalho;
use Src\Loading\Models\Graduacao\TrancamentoGraduacao;
use Src\Loading\Models\Graduacao\TurmaGraduacao;

return [
    "routine_name" => 'Graduacao',
    "schema_path" => 'Schemas/Graduacao',
    "temp_tables" => [
        'create_graduacoes_temp',
        'create_bolsasic_temp',
        'create_turmasGR_temp',
        'create_demandaTurmasGR_temp',
        'create_trancamentosGR_temp',
    ],
    "loading_config" => [
        "bolsas_ic" => [
            "query_path" => "Graduacao/bolsas_ic",
            "model" => BolsaIC::class,
            "load_type" => "full",
            "mapping" => "Graduacao/bolsa_ic_map",
            "loader" => DefaultLoader::class,
        ],
        "demanda_turmas_graduacao" => [
            "query_path" => "Graduacao/demanda_turmas_graduacao",
            "model" => DemandaTurmaGraduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/demanda_turma_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "disciplinas_graduacao" => [
            "query_path" => "Graduacao/disciplinas_graduacao",
            "model" => DisciplinaGraduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/disciplina_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "graduacoes" => [
            "query_path" => "Graduacao/graduacoes",
            "model" => Graduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "habilitacoes" => [
            "query_path" => "Graduacao/habilitacoes",
            "model" => Habilitacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/habilitacao_map",
            "loader" => DefaultLoader::class,
        ],
        "iniciacoes_cientificas" => [
            "query_path" => "Graduacao/iniciacoes_cientificas",
            "model" => IniciacaoCientifica::class,
            "load_type" => "full",
            "mapping" => "Graduacao/iniciacao_cientifica_map",
            "loader" => DefaultLoader::class,
        ],
        "intercambios_graduacao" => [
            "query_path" => "Graduacao/intercambios_graduacao",
            "model" => IntercambioGraduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/intercambio_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "ministrantes_graduacao" => [
            "query_path" => "Graduacao/ministrantes_graduacao",
            "model" => MinistranteGraduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/ministrante_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "notas_ingresso_graduacao" => [
            "query_path" => "Graduacao/notas_ingresso_graduacao",
            "model" => NotasIngressoGraduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/notas_ingresso_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "siicusp_participantes" => [
            "query_path" => "Graduacao/siicusp_participantes",
            "model" => SIICUSPParticipante::class,
            "load_type" => "full",
            "mapping" => "Graduacao/siicusp_participante_map",
            "loader" => DefaultLoader::class,
        ],
        "siicusp_trabalhos" => [
            "query_path" => "Graduacao/siicusp_trabalhos",
            "model" => SIICUSPTrabalho::class,
            "load_type" => "full",
            "mapping" => "Graduacao/siicusp_trabalho_map",
            "loader" => DefaultLoader::class,
        ],
        "trancamentos_graduacao" => [
            "query_path" => "Graduacao/trancamentos_graduacao",
            "model" => TrancamentoGraduacao::class,
            "load_type" => "full",
            "mapping" => "Graduacao/trancamento_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
        "turmas_graduacao" => [
            "query_path" => "Graduacao/turmas_graduacao",
            "model" => TurmaGraduacao::class,
            "load_type" => "paginated",
            "mapping" => "Graduacao/turma_graduacao_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
