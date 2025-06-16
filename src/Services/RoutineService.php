<?php

namespace Src\Services;

use Src\Utils\Stopwatch;

class RoutineService
{
    public static function runRoutine(array $routineMap)
    {
        $runTimer = new Stopwatch($routineMap['schemaCollection']);

        echo "\n({$routineMap['schemaCollection']})\n";

        // Generate necessary temp tables
        TempTableService::generateTempTables($routineMap['tempTables']);

        // Wipe old records and write new ones
        $dataUpdateService = new DataLoadService();
        $dataUpdateService->loadOrReloadTables($routineMap);

        $runTimer->stop();
    }
}
