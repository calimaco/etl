<?php

namespace Src\Services;

use Src\Utils\Stopwatch;

class RoutineService
{
    public static function runRoutine(
        array $routineMap,
        array $notToWipe = []
    ) {
        $backtrace = debug_backtrace()[0]['file'];
        $caller = basename($backtrace);
        $runTimer = new Stopwatch($caller);

        echo "\n($caller)\n";

        // Generate necessary temp tables
        TempTableService::generateTempTables($routineMap['tempTables']);

        // Wipe old records and write new ones
        $dataUpdateService = new DataLoadService();
        $dataUpdateService->loadOrReloadTables($routineMap, $notToWipe);

        $runTimer->stop();
    }
}
