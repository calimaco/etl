<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_trabalho' => fn($r) => ReplicadoModelsUtils::getSiicuspTrabalhoId($r),
    'tipo_participante' => fn($r) => Deparas::tiposParticipantes[$r['tipo_participante']]
        ?? $r['tipo_participante'],
    'numero_usp' => 'numero_usp',
    'nome_participante' => 'nome_participante',
    'codigo_unidade' => 'codigo_unidade',
    'sigla_unidade' => 'sigla_unidade',
    'codigo_departamento' => 'codigo_departamento',
    'nome_departamento' => 'nome_departamento',
    'participante_apresentador' => 'participante_apresentador',
];
