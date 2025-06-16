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
    'graduacao',
    'posGraduacao',
    // 'pesquisaAvancada',
    // 'servidor',
    // 'ceu',
    // 'programaUSP',
    'questSocioEcon',
    // 'lattes',
];

// user param to trigger a (re)build
if (in_array("-f", $argv)) {
    DatabaseSetupService::setup(true);
}

// make sure we're good to go
BuilderUtils::validateCurrentDatabaseStructure(true);

$routineMaps = require 'src/routine_maps.php';

foreach ($routines as $routine) {
    $routineMap = $routineMaps[$routine];
    RoutineService::runRoutine($routineMap);

    // for cli readability
    echo str_repeat('_', 50);
    ConsoleOutput::echoNewlines(2);
};

$runTimer->stop();
