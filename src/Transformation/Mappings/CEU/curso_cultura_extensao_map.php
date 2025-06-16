<?php

use Src\Utils\CommonUtils;

return [
    'codigo_curso_ceu' => 'codigo_curso_ceu',
    'sigla_unidade' => 'sigla_unidade',
    'codigo_departamento' => 'codigo_departamento',
    'nome_departamento' => 'nome_departamento',
    'modalidade_curso' => 'modalidade_curso',
    'nome_curso' => fn($r) => CommonUtils::cleanInput(
        $r['nome_curso'],
        ['remove_trailing_periods', 'trim_quotes']
    ),
    'tipo' => 'tipo',
    'codigo_colegiado' => 'codigo_colegiado',
    'sigla_colegiado' => 'sigla_colegiado',
    'area_conhecimento' => 'area_conhecimento',
    'area_tematica' => 'area_tematica',
    'linha_extensao' => 'linha_extensao',
];
