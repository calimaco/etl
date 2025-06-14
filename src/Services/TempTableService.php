<?php

namespace Src\Services;

use Src\Utils\CommonUtils;
use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

class TempTableService
{
    public static function generateTempTables(array $scripts)
    {
        $runTimer = new Stopwatch();
        self::executeTempTableScripts($scripts);
        $runTimer->stop();

        ConsoleOutput::echoNewlines(1);
    }

    private static function executeTempTableScripts(array $scripts)
    {
        $total = count($scripts);
        $progress = 0;

        echo "\nGenerating {$total} temp table(s):\n";

        if (!count($scripts) > 0) {
            return CommonUtils::renderLoadingBar(1, 1);
        }

        foreach ($scripts as $script) {
            CommonUtils::renderLoadingBar($progress, $total);

            $file = __DIR__ . '/../Extraction/SetupScripts/' . $script . '.sql';
            $stmts = file_get_contents($file);
            ReplicadoDBService::executeBatch($stmts);

            $progress++;
            CommonUtils::renderLoadingBar($progress, $total);
        };
    }
}
