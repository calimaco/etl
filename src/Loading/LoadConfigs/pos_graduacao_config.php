<?php

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
    "bancas_posgraduacao" => [
        "query_path" => "PosGraduacao/bancas_posgraduacao",
        "model" => BancaPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/banca_pos_graduacao_map"
    ],
    "bolsas_posgraduacao" => [
        "query_path" => "PosGraduacao/bolsas_posgraduacao",
        "model" => BolsaPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/bolsa_pos_graduacao_map"
    ],
    "coordenadores_posgraduacao" => [
        "query_path" => "PosGraduacao/coordenadores_posgraduacao",
        "model" => CoordenadorPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/coordenador_pos_graduacao_map"
    ],
    "credenciamentos_pg" => [
        "query_path" => "PosGraduacao/credenciamentos_pg",
        "model" => CredenciamentoPG::class,
        "load_type" => "full",
        "map" => "PosGraduacao/credenciamento_pg_map"
    ],
    "defesas_posgraduacao" => [
        "query_path" => "PosGraduacao/defesas_posgraduacao",
        "model" => DefesaPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/defesa_pos_graduacao_map"
    ],
    "disciplinas_posgraduacao" => [
        "query_path" => "PosGraduacao/disciplinas_posgraduacao",
        "model" => DisciplinaPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/disciplina_pos_graduacao_map"
    ],
    "estagios_pae" => [
        "query_path" => "PosGraduacao/estagios_pae",
        "model" => EstagioPae::class,
        "load_type" => "full",
        "map" => "PosGraduacao/estagio_pae_map"
    ],
    "ministrantes_posgraduacao" => [
        "query_path" => "PosGraduacao/ministrantes_posgraduacao",
        "model" => MinistrantePosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/ministrante_pos_graduacao_map"
    ],
    "ocorrencias_posgraduacao" => [
        "query_path" => "PosGraduacao/ocorrencias_posgraduacao",
        "model" => OcorrenciaPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/ocorrencia_pos_graduacao_map"
    ],
    "orientacoes_posgraduacao" => [
        "query_path" => "PosGraduacao/orientacoes_posgraduacao",
        "model" => OrientacaoPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/orientacao_pos_graduacao_map"
    ],
    "posgraduacoes_conveniadas" => [
        "query_path" => "PosGraduacao/posgraduacoes_conveniadas",
        "model" => PosGraduacaoConveniada::class,
        "load_type" => "full",
        "map" => "PosGraduacao/pos_graduacao_conveniada_map"
    ],
    "posgraduacoes" => [
        "query_path" => "PosGraduacao/posgraduacoes",
        "model" => PosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/pos_graduacao_map"
    ],
    "proficiencia_idiomas_pg" => [
        "query_path" => "PosGraduacao/proficiencia_idiomas_pg",
        "model" => ProficienciaIdiomaPG::class,
        "load_type" => "full",
        "map" => "PosGraduacao/proficiencia_idioma_pg_map"
    ],
    "turmas_posgraduacao" => [
        "query_path" => "PosGraduacao/turmas_posgraduacao",
        "model" => TurmaPosGraduacao::class,
        "load_type" => "full",
        "map" => "PosGraduacao/turma_pos_graduacao_map"
    ],
];
