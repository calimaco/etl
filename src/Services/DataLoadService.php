<?php

namespace Src\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Transformation\Transformer;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\LoadingUtils;
use Src\Utils\Stopwatch;

class DataLoadService
{
    public function updateTables(string $ops)
    {
        $message = "Fetching data and writing new records:";

        $op = require "src/Loading/Operations/{$ops}.php";

        $task = function ($tables) {
            $object = new Transformer($tables['something'], $tables['query_path']);
            LoadingUtils::insertIntoTable($tables['load_type'], $object, $tables['model']);
        };

        DatabaseTaskRunner::runTask($task, $message, [$op]);
    }

    public static function wipeTables(array $tables)
    {
        $message = "Wiping tables (if necessary):";

        $task = function ($table) {
            Capsule::table($table)->delete();
        };

        Capsule::statement("SET FOREIGN_KEY_CHECKS = 0");

        DatabaseTaskRunner::runTask($task, $message, array_reverse($tables));

        Capsule::statement("SET FOREIGN_KEY_CHECKS = 1");
    }


    public function loadOrReloadTables(array $routineMap, array $notToWipe = [])
    {
        try {
            Capsule::transaction(function () use ($routineMap, $notToWipe) {

                $tablesGroupsToWipe = array_diff($routineMap['tableGroups'], $notToWipe);
                $tables = BuilderUtils::getTablesNamesFromTableGroups($routineMap['tableGroups'], true);

                if (!empty($tablesGroupsToWipe)) {
                    $runTimer1 = new Stopwatch();
                    $this->wipeTables($tablesGroupsToWipe);
                    $runTimer1->stop();
                    ConsoleOutput::echoNewlines(1);
                }

                $runTimer2 = new Stopwatch();
                $this->updateTables($routineMap['ops']);
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
