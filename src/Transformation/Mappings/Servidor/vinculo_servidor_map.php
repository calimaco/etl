<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'id_vinculo' => fn($r) => ReplicadoModelsUtils::getVinculoId($r),
    'numero_usp' => 'numero_usp',
    'vinculo' => fn($r) => Deparas::tiposVinculoServidores[$r['vinculo']]
        ?? $r['vinculo'],
    'situacao_atual' => fn($r) => Deparas::situacoesServidores[$r['situacao_atual']]
        ?? $r['situacao_atual'],
    'data_inicio_vinculo' => 'data_inicio_vinculo',
    'data_fim_vinculo' => 'data_fim_vinculo',
    'cod_ultimo_setor' => 'cod_ultimo_setor',
    'nome_ultimo_setor' => 'nome_ultimo_setor',
    'ambito_funcao' => 'ambito_funcao',
    'classe' => 'classe',
    // 'referencia' => fn($r) => $this->getRef(
    //     $r['vinculo'],
    //     $r['merito'],
    //     $r['referencia']
    // ),
    // VER
    'tipo_jornada' => 'tipo_jornada',
    'tipo_ingresso' => 'tipo_ingresso',
    'data_ultima_alteracao_funcional' => 'data_ultima_alteracao_funcional',
    'ultima_ocorrencia' => 'ultima_ocorrencia',
    'data_inicio_ultima_ocorrencia' => 'data_inicio_ultima_ocorrencia',
];
