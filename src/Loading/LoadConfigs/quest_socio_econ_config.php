<?php

use Src\Loading\Models\QuestSocioEcon\QuestionarioQuestao;
use Src\Loading\Models\QuestSocioEcon\QuestionarioResposta;

return [
    "questionario_questoes" => [
        "query_path" => "QuestSocioEcon/questionario_questoes",
        "model" => QuestionarioQuestao::class,
        "load_type" => "full",
        "map" => "QuestSocioEcon/questionario_questao_map"
    ],
    "questionario_respostas" => [
        "query_path" => "QuestSocioEcon/questionario_respostas",
        "model" => QuestionarioResposta::class,
        "load_type" => "full",
        "map" => "QuestSocioEcon/questionario_resposta_map"
    ],
];
