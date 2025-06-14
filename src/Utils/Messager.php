<?php

namespace Src\Utils;

use Exception;

class Messager
{
    private static $messages = null;

    public static function loadMessages()
    {
        if (self::$messages === null) {
            try {
                self::$messages = include('src/Utils/messages.php');
            } catch (Exception $e) {
                throw new Exception("Message file could not be loaded.");
            }
        }
    }

    public static function getMessage(string $key)
    {
        self::loadMessages();
        return self::$messages[$key] ?? '{{ Intended message not found. }}';
    }
}
