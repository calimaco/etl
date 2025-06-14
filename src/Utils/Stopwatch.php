<?php

namespace Src\Utils;

class Stopwatch
{
    private float $start;
    private ?string $caller;
    private ?float $end = null;

    public function __construct(?string $caller = null)
    {
        $this->start = microtime(true);
        $this->caller = $caller;
    }

    public function stop()
    {
        $this->end = microtime(true);
        $this->logTrackedTime();
    }

    public function logTrackedTime()
    {
        $diff = round($this->end - $this->start);
        $minutes = floor($diff / 60);
        $seconds = $diff % 60;
        $isodate = sprintf("%02dm%02ds", $minutes, $seconds);

        if ($this->caller) {
            $text = "Total <{$this->caller}> runtime: {$isodate}";
            ConsoleOutput::prettyPrint([$text]);
        } else {
            echo str_repeat(" ", 4);
            echo "Runtime: {$isodate}\n";
        }
    }
}
