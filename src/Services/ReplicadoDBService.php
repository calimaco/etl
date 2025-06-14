<?php

namespace Src\Services;

use PDO;
use Src\Utils\ConsoleOutput;
use Src\Utils\TransformationUtils;

class ReplicadoDBService
{
    private static $instance;

    private static function getInstance()
    {
        $host = getenv('REPLICADO_HOST');
        $port = getenv('REPLICADO_PORT');
        $db = getenv('REPLICADO_DATABASE');
        $user = getenv('REPLICADO_USERNAME');
        $pass = getenv('REPLICADO_PASSWORD');

        if (!self::$instance) {
            try {
                $dsn = "dblib:host={$host}:{$port};dbname={$db}";
                self::$instance = new PDO($dsn, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\Throwable $t) {
                echo "Erro na conexão! {$t}";
                die();
            }
        }

        return self::$instance;
    }

    public static function closeConnection()
    {
        self::$instance = null;
    }

    public static function fetchData(string $query, array $param = [])
    {
        $db = self::getInstance();
        $stmt = $db->prepare($query);

        try {
            $stmt->execute();
        } catch (\Throwable $t) {
            echo "Erro na consulta! {$t}";
            die();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result) && getenv('REPLICADO_SYBASE') == 1) {
            $result = TransformationUtils::convertArrayToUtf8($result);
            $result = array_map(function ($arr) {
                return array_map([TransformationUtils::class, 'initialDataCleanup'], $arr);
            }, $result);
        }

        return $result;
    }

    public static function executeBatch(string $query)
    {
        $db = self::getInstance();

        $statements = explode(';', $query);
        $statements = array_filter($statements);

        try {
            foreach ($statements as $statement) {
                $stmt = $db->prepare($statement);
                $stmt->execute();
            }
        } catch (\Exception $e) {
            $wasTimedOut = strpos($e->getMessage(), "Changed database context");

            if ($wasTimedOut !== false) {
                ConsoleOutput::printMessage('db_connection_timeout');
            } else {
                ConsoleOutput::printException($e);
            }

            ConsoleOutput::printMessage('exiting_script');
            die();
        }
    }
}
