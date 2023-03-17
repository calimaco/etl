<?php

namespace Src\Loading\SchemaBuilder\Schemas;

class ServidoresSchemas
{
    const servidores = [

        "tableName" => "servidores",

        "columns" => [
            "numero_usp" => [
                "type" => "integer"
            ],
            "nome_aluno" => [
                "type" => "string",
                "size" => 256
            ],
            "ano_nascimento" => [
                "type" => "smallInteger"
            ],
            "nacionalidade" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "cidade_nascimento" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "estado_nascimento" => [
                "type" => "string",
                "size" => 2,
                "nullable" => true
            ],
            "pais_nascimento" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "raca" => [
                "type" => "string",
                "size" => 32,
                "nullable" => true
            ],
            "sexo" => [
                "type" => "string",
                "size" => 1,
                "nullable" => true
            ],
        ],

        "primary" => [
            "key" => ["numero_usp"]
        ],
        
        "foreign" => [
            //
        ]
    ];

    const vinculos_servidores = [

        "tableName" => "vinculos_servidores",

        "columns" => [
            "numero_usp" => [
                "type" => "integer"
            ],
            "numero_sequencia_vinculo" => [
                "type" => "smallInteger"
            ],
            "tipo_vinculo" => [
                "type" => "string",
                "size" => 48
            ],
            "data_inicio_vinculo" => [
                "type" => "date"
            ],
            "data_fim_vinculo" => [
                "type" => "date",
                "nullable" => true
            ],
            "situacao_atual" => [
                "type" => "string",
                "size" => 24
            ],
            "cod_ultimo_setor" => [
                "type" => "integer",
                "nullable" => true
            ],
            "nome_ultimo_setor" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "tipo_ingresso" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "ultima_ocorrencia" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "data_inicio_ultima_ocorrencia" => [
                "type" => "date",
                "nullable" => true
            ],
            "nome_carreira" => [
                "type" => "string",
                "size" => 64,
                "nullable" => true
            ],
            "nome_funcao" => [
                "type" => "string",
                "size" => 64,
                "nullable" => true
            ],
            "nome_classe" => [
                "type" => "string",
                "size" => 64,
                "nullable" => true
            ],
            "nome_grau_provimento" => [
                "type" => "char",
                "size" => 1,
                "nullable" => true
            ],
            "data_ultima_alteracao_funcional" => [
                "type" => "date",
                "nullable" => true
            ],
            "cargo" => [
                "type" => "string",
                "size" => 64,
                "nullable" => true
            ],
            "tipo_jornada" => [
                "type" => "string",
                "size" => 32,
                "nullable" => true
            ],
            "tipo_condicao" => [
                "type" => "string",
                "size" => 32,
                "nullable" => true
            ],
        ],

        "primary" => [
            //
        ],
        
        "foreign" => [
            [
                "keys" => "numero_usp",
                "references" => "numero_usp",
                "on" => "servidores",
                "onDelete" => "cascade"
            ],
        ]
    ];
}