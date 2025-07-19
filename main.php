<?php

require_once __DIR__ . "/vendor/autoload.php";

use Src\Services\DatabaseSetupService;
use Src\Services\RoutineService;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

ini_set('memory_limit', '4G');
$runTimer = new Stopwatch(basename(__FILE__));

$routines = [
    // 'pessoa',
    // 'graduacao',
    // 'pos_graduacao',
    // 'pesquisa_avancada',
    'servidor',
    // 'ceu',
    // 'programa_usp',
    // 'quest_socio_econ',
    // 'lattes',
];

// user param to trigger a (re)build
if (in_array("-f", $argv)) {
    DatabaseSetupService::setup(true);
}

// make sure we're good to go
BuilderUtils::validateCurrentDatabaseStructure(true);

foreach ($routines as $routine) {
    $blueprint = require "src/Blueprints/{$routine}.php";
    RoutineService::runRoutine($blueprint);

    // for cli readability
    echo str_repeat('_', 50);
    ConsoleOutput::echoNewlines(2);
};

$runTimer->stop();
