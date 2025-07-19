<?php

namespace Src\Services;

use Src\Utils\Stopwatch;

class RoutineService
{
    public static function runRoutine(array $blueprint)
    {
        [
            'name' => $routineName,
            'temp_tables' => $routineTempTables,
            'loading_config' => $routineLoadingConfig
        ]
            = $blueprint;

        $runTimer = new Stopwatch($routineName);
        echo "\n({$routineName})\n";

        // Generate necessary temp tables
        TempTableService::generateTempTables($routineTempTables);

        // Wipe old records and write new ones
        $dataUpdateService = new DataLoadService();
        $dataUpdateService->loadOrReloadTables($routineName, $routineLoadingConfig);

        $runTimer->stop();
    }
}
