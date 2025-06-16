<?php

use Src\Utils\CommonUtils;
use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'codigo_oferecimento' => fn($r) => ReplicadoModelsUtils::getOferecimentoCCExId($r),
    'codigo_curso_ceu' => 'codigo_curso_ceu',
    'situacao_oferecimento' => fn($r) => Deparas::situacaoEdicaoCCEx[$r['situacao_oferecimento']]
        ?? $r['situacao_oferecimento'],
    'data_inicio_oferecimento' => 'data_inicio_oferecimento',
    'data_fim_oferecimento' => 'data_fim_oferecimento',
    'total_carga_horaria' => fn($r) => ($r['total_carga_horaria'] / 60),
    'qntd_vagas_ofertadas' => 'qntd_vagas_ofertadas',
    'curso_pago' => 'curso_pago',
    'valor_inscricao_edicao' => 'valor_inscricao_edicao',
    'qntd_vagas_gratuitas' => 'qntd_vagas_gratuitas',
    'valor_previsto_arrecadacao' => 'valor_previsto_arrecadacao',
    'valor_previsto_custos' => 'valor_previsto_custos',
    'valor_previsto_prce' => 'valor_previsto_prce',
    'curso_para_empresas' => 'curso_para_empresas',
    'local_curso' => fn($r) => CommonUtils::cleanInput(
        $r['local_curso'],
        ['remove_trailing_periods']
    ),
    'data_inicio_inscricoes' => 'data_inicio_inscricoes',
    'data_fim_inscricoes' => 'data_fim_inscricoes',
    'permite_inscricao_online' => 'permite_inscricao_online',
];
