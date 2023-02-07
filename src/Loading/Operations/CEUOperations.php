<?php

namespace Src\Loading\Operations;

use Src\Transformation\ModelsReplicado\Transformer;
use Src\Transformation\ModelsReplicado\CEU\CursoCulturaExtensaoReplicado;
use Src\Loading\Models\CEU\CursoCulturaExtensao;
use Src\Transformation\ModelsReplicado\CEU\OferecimentoCCExReplicado;
use Src\Loading\Models\CEU\OferecimentoCCEx;
use Src\Transformation\ModelsReplicado\CEU\InscricaoCCExReplicado;
use Src\Loading\Models\CEU\InscricaoCCEx;

class CEUOperations
{
    public function __construct()
    {
        $this->cursosCEU = new Transformer(new CursoCulturaExtensaoReplicado, 'CEU/cursos_culturaextensao');
        $this->oferecimentosCursos = new Transformer(new OferecimentoCCExReplicado, 'CEU/oferecimentos_ccex');
        $this->inscricoesCursos = new Transformer(new InscricaoCCExReplicado, 'CEU/inscricoes_ccex');
    }

    public function updateCursosCEU()
    {
        $cursosCEU = $this->cursosCEU->transform();

        // Insert placeholders limit is 65535.
        // We need X placeholders for each row at the moment. Let's make room for Y.
        foreach(array_chunk($cursosCEU, 3000) as $chunk) 
        {
            CursoCulturaExtensao::upsert($chunk, ["codigoCursoCEU"]);
        }
    }

    public function updateOferecimentosCursos()
    {
        $oferecimentosCursos = $this->oferecimentosCursos->transform();

        // Insert placeholders limit is 65535.
        // We need X placeholders for each row at the moment. Let's make room for Y.
        foreach(array_chunk($oferecimentosCursos, 3000) as $chunk) 
        {
            OferecimentoCCEx::upsert($chunk, ["codigoOferecimento"]);
        }
    }

    public function updateInscricoesCursos()
    {
        $inscricoesCursos = $this->inscricoesCursos->transform();

        // Insert placeholders limit is 65535.
        // We need X placeholders for each row at the moment. Let's make room for Y.
        foreach(array_chunk($inscricoesCursos, 9000) as $chunk) 
        {
            InscricaoCCEx::upsert($chunk, ["codigoOferecimento", "numeroCEU", "dataInscricao", "situacaoInscricao", "origemInscricao"]);
        }
    }
}