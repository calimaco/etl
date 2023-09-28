<?php

namespace Src\Loading\Operations;

use Src\Transformation\Transformer;
use Src\Utils\ExtractionUtils;
use Src\Transformation\ModelsReplicado\Servidores\DesignacaoServidorReplicado;
use Src\Loading\Models\Servidores\DesignacaoServidor;
use Src\Transformation\ModelsReplicado\Servidores\VinculoServidorReplicado;
use Src\Loading\Models\Servidores\VinculoServidor;

class ServidoresOps
{
    private $vinculosServidores, $designacoes;

    public function __construct()
    {
        $this->vinculosServidores = new Transformer(new VinculoServidorReplicado, 'Servidores/vinculos_servidores');
        $this->designacoes = new Transformer(new DesignacaoServidorReplicado, 'Servidores/designacoes_servidores');
    }

    public function updateVinculosServidores()
    {
        ExtractionUtils::updateTable(
            'full',
            $this->vinculosServidores, 
            VinculoServidor::class
        );
    }

    public function updateDesignacoesServidores()
    {
        ExtractionUtils::updateTable(
            'full',
            $this->designacoes, 
            DesignacaoServidor::class
        );
    }
}