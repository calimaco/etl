<?php

return [
    "ceu" => [
        "schemaCollection" => 'CEU',
        "tempTables" => [
            'create_matriculasCCEX_temp',
            'create_inscricoesCCEX_temp',
        ],
        "loadConfig" => 'ceu_config',
    ],
    "graduacao" => [
        "schemaCollection" => 'Graduacao',
        "tempTables" => [
            'create_graduacoes_temp',
            'create_bolsasic_temp',
            'create_turmasGR_temp',
            'create_demandaTurmasGR_temp',
            'create_trancamentosGR_temp',
        ],
        "loadConfig" => 'graduacao_config',
    ],
    "lattes" => [
        "schemaCollection" => 'Lattes',
        "tempTables" => ['create_nuspsLattes_temp'],
        "loadConfig" => 'lattes_config',
    ],
    "pesquisaAvancada" => [
        "schemaCollection" => 'PesquisaAvancada',
        "tempTables" => ['create_supervisoesPD_temp'],
        "loadConfig" => 'pesquisa_avancada_config',
    ],
    "pessoa" => [
        "schemaCollection" => 'Pessoa',
        "tempTables" => ['create_titulos_temp'],
        "loadConfig" => 'pessoa_config',
    ],
    "posGraduacao" => [
        "schemaCollection" => 'PosGraduacao',
        "tempTables" => [
            'create_areas_programas_hotfix',
            'create_posgrad_temp',
            'create_orientacoesPG_temp',
            'create_disciplinasPG_temp',
            'create_turmasPG_temp',
            'create_ocorrenciasPG_temp',
            'create_credenciamentos_temp',
        ],
        "loadConfig" => 'pos_graduacao_config',
    ],
    "programaUSP" => [
        "schemaCollection" => 'ProgramaUSP',
        "tempTables" => [],
        "loadConfig" => 'programa_usp_config',
    ],
    "questSocioEcon" => [
        "schemaCollection" => 'QuestSocioEcon',
        "tempTables" => ['create_respostasQuest_temp'],
        "loadConfig" => 'quest_socio_econ_config',
    ],
    "servidor" => [
        "schemaCollection" => 'Servidor',
        "tempTables" => ['create_vinculosServidores_temp'],
        "loadConfig" => 'servidor_config',
    ]
];
