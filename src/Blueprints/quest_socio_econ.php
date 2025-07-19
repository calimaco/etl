<?php

use Src\Loading\Loaders\DefaultLoader;
use Src\Loading\Models\QuestSocioEcon\QuestionarioQuestao;
use Src\Loading\Models\QuestSocioEcon\QuestionarioResposta;

return [
    "routine_name" => 'QuestSocioEcon',
    "schema_path" => 'Schemas/QuestSocioEcon',
    "temp_tables" => ['create_respostasQuest_temp'],
    "loading_config" => [
        "questionario_questoes" => [
            "query_path" => "QuestSocioEcon/questionario_questoes",
            "model" => QuestionarioQuestao::class,
            "load_type" => "full",
            "mapping" => "QuestSocioEcon/questionario_questao_map",
            "loader" => DefaultLoader::class,
        ],
        "questionario_respostas" => [
            "query_path" => "QuestSocioEcon/questionario_respostas",
            "model" => QuestionarioResposta::class,
            "load_type" => "paginated",
            "mapping" => "QuestSocioEcon/questionario_resposta_map",
            "loader" => DefaultLoader::class,
        ],
    ]
];
