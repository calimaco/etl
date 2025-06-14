<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Src\Routines\Runner\RoutineService;

pcntl_alarm(25 * 60); // Kills job if it's taking too long.

$tempTables = ['create_supervisoesPD_temp'];
$tableGroups = ['PesquisasAvancadasTables'];

RoutineService::runRoutine($tempTables, $tableGroups);
