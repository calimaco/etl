<?php

namespace Src\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Loading\SchemaBuilder\TableHandler;
use Src\Utils\BuilderUtils;

class TableManagementService
{
    public static function createTables()
    {
        $message = "Creating tables:";

        $allTables = BuilderUtils::getAllETLTablesInfo(true);

        $task = function ($table) {
            TableHandler::createTable($table);
        };

        DatabaseTaskRunner::runTask($task, $message, $allTables);
    }

    public static function dropTables()
    {
        $message = "Dropping tables:";

        $task = function () {
            Capsule::schema()->dropAllTables();
        };

        DatabaseTaskRunner::runTask($task, $message);
    }
}
