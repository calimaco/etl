<?php

require_once __DIR__ . "/vendor/autoload.php";

use Src\Services\DatabaseSetupService;
use Src\Utils\Stopwatch;

pcntl_alarm(10 * 60); // Kills job if it's taking too long.

$runTimer = new Stopwatch(basename(__FILE__));

$forceRebuild = in_array("-y", $argv); // user param
DatabaseSetupService::setup($forceRebuild);

$runTimer->stop();
