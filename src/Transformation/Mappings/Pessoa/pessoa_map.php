<?php

use Src\Utils\Deparas;

return [
    'numero_usp' => 'numero_usp',
    'nome' => 'nome',
    'data_nascimento' => 'data_nascimento',
    'data_falecimento' => 'data_falecimento',
    'email' => 'email',
    'nacionalidade' => 'nacionalidade',
    'cidade_nascimento' => 'cidade_nascimento',
    'estado_nascimento' => 'estado_nascimento',
    'pais_nascimento' => 'pais_nascimento',
    'raca' => fn($r) => Deparas::racas[$r['raca']] ?? $r['raca'],
    'sexo' => 'sexo',
    'orientacao_sexual' => 'orientacao_sexual',
    'identidade_genero' => 'identidade_genero',
    'situacao_vacinal_covid' => fn($r) => Deparas::situacoesVacinaCovid[$r['situacao_vacinal_covid']]
        ?? $r['situacao_vacinal_covid'],
    // 'cpf' => 'cpf',
];
