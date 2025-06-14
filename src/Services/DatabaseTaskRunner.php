<?php

namespace Src\Services;

use Src\Utils\CommonUtils;
use Src\Utils\ConsoleOutput;

class DatabaseTaskRunner
{
    public static function runTask(
        callable $task,
        string $message,
        ?array $arg = null
    ) {
        echo $message;
        ConsoleOutput::echoNewlines(1);

        if (empty($arg)) {
            CommonUtils::renderLoadingBar(0, 1);
            $task();
            return CommonUtils::renderLoadingBar(1, 1);
        }

        $total = count($arg);
        $progress = 0;

        foreach ($arg as $argElement) {
            CommonUtils::renderLoadingBar($progress, $total);
            $task($argElement);
            $progress++;
            CommonUtils::renderLoadingBar($progress, $total);
        }
    }
}
