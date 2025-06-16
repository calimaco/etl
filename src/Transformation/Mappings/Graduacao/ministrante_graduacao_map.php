<?php

use Src\Utils\Deparas;
use Src\Utils\ReplicadoModelsUtils;

return [
    'numero_usp' => 'numero_usp',
    'id_turma' => fn($r) => ReplicadoModelsUtils::getTurmaGraduacaoId($r),
    'periodicidade_ministrante' => fn($r) => Deparas::periodicidadeProf[$r['periodicidade_ministrante']]
        ?? $r['periodicidade_ministrante']
];
