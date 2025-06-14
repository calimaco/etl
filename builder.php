<?php

require_once __DIR__ . "/vendor/autoload.php";

use Src\Utils\BuilderUtils;
use Src\Utils\Stopwatch;

pcntl_alarm(10 * 60); // Kills job if it's taking too long.

$runTimer = new Stopwatch(basename(__FILE__));

$forceRebuild = in_array("-y", $argv); // user param
BuilderUtils::setupDatabase($forceRebuild);

$runTimer->stop();
