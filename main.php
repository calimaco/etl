<?php

require_once __DIR__ . "/vendor/autoload.php";

use Src\Services\RoutineService;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

ini_set('memory_limit', '4G');
$runTimer = new Stopwatch(basename(__FILE__));

$routines = [
    // 'pessoas',
    // 'graduacao',
    // 'posGraduacao',
    'pesquisasAvancadas',
    // 'servidores',
    // 'ceu',
    // 'programasUSP',
    // 'questSocioEcon',
    // 'lattes',
];

// user param to trigger a (re)build
if (in_array("-f", $argv)) {
    BuilderUtils::setupDatabase(true);
}

// make sure we're good to go
BuilderUtils::validateCurrentDatabaseStructure(true);


$routineMaps = require 'src/routines.php';
foreach ($routines as $routine) {
    $routineMap = $routineMaps[$routine];

    RoutineService::runRoutine($routineMap);

    // for cli readability
    echo str_repeat('_', 50);
    ConsoleOutput::echoNewlines(2);
};

$runTimer->stop();
