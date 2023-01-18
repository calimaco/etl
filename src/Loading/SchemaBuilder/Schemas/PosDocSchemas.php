<?php

namespace Src\Loading\SchemaBuilder\Schemas;

class PosDocSchemas
{
    const alunos_posdoc = [

        "tableName" => "alunos_posdoc",

        "columns" => [
            "numeroUSP" => [
                "type" => "integer"
            ],
            "nomeAluno" => [
                "type" => "string",
                "size" => 256
            ],
            "anoNascimento" => [
                "type" => "smallInteger"
            ],
            "nacionalidade" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "cidadeNascimento" => [
                "type" => "string",
                "size" => 128,
                "nullable" => true
            ],
            "estadoNascimento" => [
                "type" => "string",
                "size" => 2,
                "nullable" => true
            ],
            "paisNascimento" => [
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
            "created_at" => [
                "type" => "timestamp"
            ],
            "updated_at" => [
                "type" => "timestamp"
            ],
        ],

        "primary" => [
            "key" => ["numeroUSP"]
        ],
        
        "foreign" => [
            //
        ]
    ];

    const projetos_posdoc = [

        "tableName" => "projetos_posdoc",

        "columns" => [
            "idProjeto" => [
                "type" => "string",
                "size" => 12
            ],
            "programa" => [
                "type" => "char",
                "size" => 2
            ],
            "numeroUSP" => [
                "type" => "integer"
            ],
            "dataInicioProjeto" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "dataFimProjeto" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "situacaoProjeto" => [
                "type" => "string",
                "size" => 16
            ],
            "codigoDepartamento" => [
                "type" => "integer",
                "nullable" => true
            ],
            "nomeDepartamento" => [
                "type" => "string",
                "size" => 256,
                "nullable" => true
            ],
            "tituloProjeto" => [
                "type" => "string",
                "size" => 1024
            ],
            "palavrasChave" => [
                "type" => "string",
                "size" => 256,
                "nullable" => true
            ],
            "created_at" => [
                "type" => "timestamp"
            ],
            "updated_at" => [
                "type" => "timestamp"
            ],
        ],

        "primary" => [
            "key" => ["idProjeto"]
        ],
        
        "foreign" => [
            [
                "keys" => "numeroUSP",
                "references" => "numeroUSP",
                "on" => "alunos_posdoc",
                "onDelete" => "cascade"
            ],
        ]
    ];

    const periodos_posdoc = [

        "tableName" => "periodos_posdoc",

        "columns" => [
            "idProjeto" => [
                "type" => "string",
                "size" => 12
            ],
            "sequenciaPeriodo" => [
                "type" => "smallInteger",
            ],
            "dataInicioPeriodo" => [
                "type" => "dateTime"
            ],
            "dataFimPeriodo" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "situacaoPeriodo" => [
                "type" => "string",
                "size" => 32
            ],
            "fonteRecurso" => [
                "type" => "string",
                "size" => 32
            ],
            "horasSemanais" => [
                "type" => "tinyInteger",
                "nullable" => true
            ],
            "created_at" => [
                "type" => "timestamp"
            ],
            "updated_at" => [
                "type" => "timestamp"
            ],
        ],

        "primary" => [
            "key" => ["idProjeto", "sequenciaPeriodo"]
        ],
        
        "foreign" => [
            [
                "keys" => "idProjeto",
                "references" => "idProjeto",
                "on" => "projetos_posdoc",
                "onDelete" => "cascade"
            ],
        ]
    ];

    const bolsas_posdoc = [

        "tableName" => "bolsas_posdoc",

        "columns" => [
            "idProjeto" => [
                "type" => "string",
                "size" => 12
            ],
            "sequenciaPeriodo" => [
                "type" => "smallInteger",
            ],
            "sequenciaFomento" => [
                "type" => "tinyInteger"
            ],
            "codigoFomento" => [
                "type" => "smallInteger",
                "nullable" => true
            ],
            "nomeFomento" => [
                "type" => "string",
                "size" => 256,
                "nullable" => true
            ],
            "dataInicioFomento" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "dataFimFomento" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "idFomento" => [
                "type" => "string",
                "size" => 64,
                "nullable" => true
            ],
            "created_at" => [
                "type" => "timestamp"
            ],
            "updated_at" => [
                "type" => "timestamp"
            ],
        ],

        "primary" => [
            "key" => ["idProjeto", "sequenciaPeriodo", "sequenciaFomento"],
            "keyName" => "bolsasposdoc_primary"
        ],
        
        "foreign" => [
            [
                "keys" => ["idProjeto", "sequenciaPeriodo"],
                "references" => ["idProjeto", "sequenciaPeriodo"],
                "on" => "periodos_posdoc",
                "onDelete" => "cascade"
            ],
        ]
    ];

    const afastempresas_posdoc = [

        "tableName" => "afastempresas_posdoc",

        "columns" => [
            "idProjeto" => [
                "type" => "string",
                "size" => 12
            ],
            "sequenciaPeriodo" => [
                "type" => "smallInteger",
            ],
            "seqVinculoEmpresa" => [
                "type" => 'tinyInteger'
            ],
            "nomeEmpresa" => [
                "type" => "string",
                "size" => 512
            ],
            "dataInicioAfastamento" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "dataFimAfastamento" => [
                "type" => "dateTime",
                "nullable" => true
            ],
            "tipoVinculo" => [
                "type" => "string",
                "size" => 64,
                "nullable" => true
            ],
            "created_at" => [
                "type" => "timestamp"
            ],
            "updated_at" => [
                "type" => "timestamp"
            ],
        ],

        "primary" => [
            "key" => ["idProjeto", "sequenciaPeriodo", "seqVinculoEmpresa"],
            "keyName" => "afastamentos_empregaticios_primary"
        ],
        
        "foreign" => [
            [
                "keys" => ["idProjeto", "sequenciaPeriodo"],
                "references" => ["idProjeto", "sequenciaPeriodo"],
                "on" => "periodos_posdoc",
                "onDelete" => "cascade"
            ],
        ]
    ];
}