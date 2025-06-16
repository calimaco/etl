<?php

namespace Src\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\LoadingUtils;
use Src\Utils\Stopwatch;

class DataLoadService
{
    public function updateTables(array $setTables, string $loadConfigFileName)
    {
        $setLoadConfig = require "src/Loading/LoadConfigs/{$loadConfigFileName}.php";

        $task = function ($table) use ($setLoadConfig) {
            $tableLoadConfig = $setLoadConfig[$table];
            $object = new TransformerService($tableLoadConfig['map'], $tableLoadConfig['query_path']);
            LoadingUtils::insertIntoTable($tableLoadConfig['load_type'], $object, $tableLoadConfig['model']);
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


    public function loadOrReloadTables(array $routineMap)
    {
        try {
            Capsule::transaction(function () use ($routineMap) {

                ['schemaCollection' => $collection, 'loadConfig' => $loadConfigFileName] = $routineMap;
                $tables = BuilderUtils::getTablesNamesFromTableCollections($collection, true);

                $runTimer1 = new Stopwatch();
                echo "Wiping tables (if necessary):";
                $this->wipeTables($tables);
                $runTimer1->stop();
                ConsoleOutput::echoNewlines(1);

                $runTimer2 = new Stopwatch();
                echo "Fetching data and writing new records:";
                $this->updateTables($tables, $loadConfigFileName);
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
