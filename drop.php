<?php

require_once __DIR__ . "/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

$runTimer = new Stopwatch(basename(__FILE__));

ConsoleOutput::printMessage('wiping_db');
Capsule::schema()->dropAllTables();

$runTimer->stop();
