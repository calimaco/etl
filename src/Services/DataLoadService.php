<?php

namespace Src\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

class DataLoadService
{
    public function updateTables(array $setTables, string $loadConfigFileName)
    {
        $task = function ($table) use ($setLoadConfig) {
            $tableLoadConfig = $setLoadConfig[$table];
        };

        ProgressTaskRunner::run($task, $setTables);
    }

    public static function wipeTables(array $tables)
    {
        $task = function ($table) {
            Capsule::table($table)->delete();
        };

        Capsule::statement("SET FOREIGN_KEY_CHECKS = 0");
        ProgressTaskRunner::run($task, array_reverse($tables));
        Capsule::statement("SET FOREIGN_KEY_CHECKS = 1");
    }


    public function loadOrReloadTables(string $routineName, array $routineLoadingConfig)
    {
        try {
            Capsule::transaction(function () use ($routineName, $routineLoadingConfig) {

                $tables = BuilderUtils::getTableNamesFromDomains($routineName, true);
                // get tables here with routine schema path

                $runTimer1 = new Stopwatch();
                echo "Wiping tables (if necessary):";
                $this->wipeTables($tables);
                $runTimer1->stop();
                ConsoleOutput::echoNewlines(1);

                $runTimer2 = new Stopwatch();
                echo "Fetching data and writing new records:";
                $this->updateTables($tables, $routineLoadingConfig);
                $runTimer2->stop();
                ConsoleOutput::echoNewlines(2);
            });
        } catch (\Exception $e) {
            ConsoleOutput::printException($e);
            ConsoleOutput::printMessage('exiting_script');
            exit();
        }
    }
}
