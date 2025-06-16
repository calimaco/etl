<?php

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
    "bolsas_ic" => [
        "query_path" => "Graduacao/bolsas_ic",
        "model" => BolsaIC::class,
        "load_type" => "full",
        "map" => "Graduacao/bolsa_ic_map"
    ],
    "demanda_turmas_graduacao" => [
        "query_path" => "Graduacao/demanda_turmas_graduacao",
        "model" => DemandaTurmaGraduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/demanda_turma_graduacao_map"
    ],
    "disciplinas_graduacao" => [
        "query_path" => "Graduacao/disciplinas_graduacao",
        "model" => DisciplinaGraduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/disciplina_graduacao_map"
    ],
    "graduacoes" => [
        "query_path" => "Graduacao/graduacoes",
        "model" => Graduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/graduacao_map"
    ],
    "habilitacoes" => [
        "query_path" => "Graduacao/habilitacoes",
        "model" => Habilitacao::class,
        "load_type" => "full",
        "map" => "Graduacao/habilitacao_map"
    ],
    "iniciacoes_cientificas" => [
        "query_path" => "Graduacao/iniciacoes_cientificas",
        "model" => IniciacaoCientifica::class,
        "load_type" => "full",
        "map" => "Graduacao/iniciacao_cientifica_map"
    ],
    "intercambios_graduacao" => [
        "query_path" => "Graduacao/intercambios_graduacao",
        "model" => IntercambioGraduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/intercambio_graduacao_map"
    ],
    "ministrantes_graduacao" => [
        "query_path" => "Graduacao/ministrantes_graduacao",
        "model" => MinistranteGraduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/ministrante_graduacao_map"
    ],
    "notas_ingresso_graduacao" => [
        "query_path" => "Graduacao/notas_ingresso_graduacao",
        "model" => NotasIngressoGraduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/notas_ingresso_graduacao_map"
    ],
    "siicusp_participantes" => [
        "query_path" => "Graduacao/siicusp_participantes",
        "model" => SIICUSPParticipante::class,
        "load_type" => "full",
        "map" => "Graduacao/siicusp_participante_map"
    ],
    "siicusp_trabalhos" => [
        "query_path" => "Graduacao/siicusp_trabalhos",
        "model" => SIICUSPTrabalho::class,
        "load_type" => "full",
        "map" => "Graduacao/siicusp_trabalho_map"
    ],
    "trancamentos_graduacao" => [
        "query_path" => "Graduacao/trancamentos_graduacao",
        "model" => TrancamentoGraduacao::class,
        "load_type" => "full",
        "map" => "Graduacao/trancamento_graduacao_map"
    ],
    "turmas_graduacao" => [
        "query_path" => "Graduacao/turmas_graduacao",
        "model" => TurmaGraduacao::class,
        "load_type" => "paginated",
        "map" => "Graduacao/turma_graduacao_map"
    ],
];
