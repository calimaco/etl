<?php

namespace Src\Services;

use Src\Utils\ConsoleOutput;
use Src\Utils\Stopwatch;

class SchemaBuilderService
{

    public function rebuildDB()
    {
        $this->nukeDB();
        $this->buildDB();
    }

    public function buildDB()
    {
        $runTimer = new Stopwatch();
        TableManagementService::createTables();
        $runTimer->stop();

        echo ConsoleOutput::printMessage('spacing_lines');
    }

    public function nukeDB()
    {
        $runTimer = new Stopwatch();
        TableManagementService::dropTables();
        $runTimer->stop();

        ConsoleOutput::echoNewlines(1);
    }
}
