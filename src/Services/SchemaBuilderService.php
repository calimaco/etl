<?php

namespace Src\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Services\TableBuilderService;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

class SchemaBuilderService
{
    public function rebuildDB()
    {
        $this->nukeDB();
        $this->buildDB();
    }

    public function nukeDB()
    {
        $runTimer = new Stopwatch();

        echo "Dropping tables:";

        self::dropAllTables();
        $runTimer->stop();

        ConsoleOutput::echoNewlines(1);
    }

    public function buildDB()
    {
        $runTimer = new Stopwatch();

        echo "Creating tables:";

        self::createAllTables();
        $runTimer->stop();

        echo ConsoleOutput::printMessage('spacing_lines');
    }

    private static function dropAllTables()
    {
        $task = function () {
            Capsule::schema()->dropAllTables();
        };

        ProgressTaskRunner::run($task);
    }

    private static function createAllTables()
    {
        $allTables = BuilderUtils::getAllETLTablesInfo(true);

        $task = function ($table) {
            TableBuilderService::createTable($table);
        };

        ProgressTaskRunner::run($task, $allTables);
    }
}
