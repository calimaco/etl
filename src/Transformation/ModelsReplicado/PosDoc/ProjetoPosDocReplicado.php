<?php

namespace Src\Transformation\ModelsReplicado\PosDoc;

use Src\Utils\TransformationUtils;
use Src\Utils\Deparas;
use Src\Transformation\Interfaces\Mapper;

class ProjetoPosDocReplicado implements Mapper
{
    public function mapping(Array $projetoPosDoc)
    {
        $properties = [
            'id_projeto' => $projetoPosDoc['ano_projeto'] . '-' . $projetoPosDoc['codigo_projeto'],
            'modalidade' => Deparas::modalidadesPD[$projetoPosDoc['codigo_modalidade']] ?? 'XX',
            'numero_usp' => $projetoPosDoc['numero_usp'],
            'data_inicio_projeto' => $projetoPosDoc['data_inicio_projeto'],
            'data_fim_projeto' => $projetoPosDoc['data_fim_projeto'],
            'situacao_projeto' => $projetoPosDoc['situacao_projeto'],
            'codigo_departamento' => $projetoPosDoc['codigo_departamento'],
            'nome_departamento' => $projetoPosDoc['nome_departamento'],
            'titulo_projeto' => $projetoPosDoc['titulo_projeto'],
            'area_cnpq' => $projetoPosDoc['area_cnpq'],
            'palavras_chave' => $this->palavrasChave(
                                                    array(
                                                        $projetoPosDoc['palcha_1'],
                                                        $projetoPosDoc['palcha_2'],
                                                        $projetoPosDoc['palcha_3']
                                                    )),
        ];

        return $properties;
    }

    private function palavrasChave(array $palavras)
    {
        $palavrasChave = array_filter($palavras, function ($palavra) { return !empty($palavra); });

        return mb_strtoupper(implode("; ", $palavrasChave), 'UTF-8');
    }
}