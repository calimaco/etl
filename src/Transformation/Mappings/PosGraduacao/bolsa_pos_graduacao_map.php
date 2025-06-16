<?php

use Src\Utils\CommonUtils;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_bolsa' => fn($r) => ReplicadoModelsUtils::getBolsaPosGraduacaoId($r),
    'id_posgraduacao' => fn($r) => ReplicadoModelsUtils::getPosGraduacaoId($r),
    'situacao_bolsa' => 'situacao_bolsa',
    'data_inicio_bolsa' => 'data_inicio_bolsa',
    'data_fim_bolsa' => 'data_fim_bolsa',
    'codigo_instituicao_fomento' => 'codigo_instituicao_fomento',
    'sigla_instituicao_fomento' => 'sigla_instituicao_fomento',
    'nome_instituicao_fomento' => fn($r) => CommonUtils::cleanInput(
        $r['nome_instituicao_fomento'],
        ['decode_html']
    ),
    'codigo_programa_fomento' => 'codigo_programa_fomento',
    'nome_programa_fomento' => fn($r) => CommonUtils::cleanInput(
        $r['nome_programa_fomento'],
        ['remove_trailing_periods', 'trim_quotes']
    ),
];
