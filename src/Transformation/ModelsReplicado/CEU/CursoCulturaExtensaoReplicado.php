<?php

namespace Src\Transformation\ModelsReplicado\CEU;

use Src\Utils\Deparas;
use Src\Transformation\Interfaces\Mapper;
use Src\Utils\CommonUtils;

class CursoCulturaExtensaoReplicado implements Mapper
{
    public function mapping(Array $cursoCEU)
    {
        $properties = [
            'codigo_curso_ceu' => $cursoCEU['codigo_curso_ceu'],
            'sigla_unidade' => $cursoCEU['sigla_unidade'],
            'codigo_departamento' => $cursoCEU['codigo_departamento'],
            'nome_departamento' => $cursoCEU['nome_departamento'],
            'modalidade_curso' => $cursoCEU['modalidade_curso'],
            'nome_curso' => CommonUtils::cleanInput(
                $cursoCEU['nome_curso'],
                ['remove_trailing_periods', 'trim_quotes']
            ),
            'tipo' => $cursoCEU['tipo'],
            'codigo_colegiado' => $cursoCEU['codigo_colegiado'],
            'sigla_colegiado' => $cursoCEU['sigla_colegiado'],
            'area_conhecimento' => $cursoCEU['area_conhecimento'],
            'area_tematica' => $cursoCEU['area_tematica'],
            'linha_extensao' => $cursoCEU['linha_extensao'],
        ];

        return $properties;
    }
}