<?php

namespace Src\Utils;

use Exception;

class ConsoleOutput
{
    public static function write(string $message)
    {
        echo PHP_EOL . $message;
    }

    public static function printMessage(string $messageKey): void
    {
        $message = Messager::getMessage($messageKey);
        self::write($message);
    }

    public static function printException(Exception $e): void
    {
        $message = "[EXCEPTION] " . $e->getMessage();
        $trace = $e->getTraceAsString();

        self::write($message);
        self::write("Stack trace:\n" . $trace);
    }

    public static function newlines(int $count)
    {
        return str_repeat(PHP_EOL, $count);
    }

    public static function echoNewlines(int $count)
    {
        echo self::newlines($count);
    }

    public static function prettyPrint(array $texts)
    {
        $mbStrlens = array_map('mb_strlen', $texts);
        $length = max($mbStrlens);

        $paddingLen = 4;
        $horizontalLine = str_repeat("═", $length + $paddingLen);
        $padding = str_repeat(" ", $paddingLen / 2);

        echo "╔" . $horizontalLine . "╗" . PHP_EOL;

        foreach ($texts as $text) {
            echo "║" . $padding . str_pad($text, $length) . $padding . "║" . PHP_EOL;
        }

        echo "╚" . $horizontalLine . "╝" . str_repeat(PHP_EOL, 2);
    }
}
