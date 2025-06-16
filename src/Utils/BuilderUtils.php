<?php

namespace Src\Utils;

require_once __DIR__ . "/../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Utils\TableSorter;

class BuilderUtils
{
    public static function getAllTableCollectionNames()
    {
        return [
            'Pessoa',
            'Graduacao',
            'PosGraduacao',
            'PesquisaAvancada',
            'CEU',
            'Servidor',
            'ProgramaUSP',
            'QuestSocioEcon',
            'Lattes',
        ];
    }

    public static function getTablesNamesFromTableCollections(
        string|array $collectionNames,
        bool $sortedByDependencies = false
    ) {
        if (is_string($collectionNames)) $collectionNames = [$collectionNames];

        $tablesNames = [];

        $tablesProperties = self::getTablesInfoFromTableCollections($collectionNames, $sortedByDependencies);

        foreach ($tablesProperties as $tableProperties) {
            $tablesNames[] = $tableProperties['tableName'];
        }

        return $tablesNames;
    }

    public static function getTablesInfoFromTableCollections(
        string|array $collectionNames,
        bool $sortedByDependencies = false
    ) {
        if (is_string($collectionNames)) $collectionNames = [$collectionNames];

        $tablesInfo = [];

        foreach ($collectionNames as $collectionName) {
            $collectionPath = self::getTableCollectionPath($collectionName);
            $files = glob("$collectionPath/*.php");

            foreach ($files as $file) {
                $content = include $file;
                $tablesInfo[] = $content;
            }
        }

        if ($sortedByDependencies) {
            return TableSorter::sort($tablesInfo);
        }

        return $tablesInfo;
    }

    private static function getTableCollectionPath(string $collectionName)
    {
        return __DIR__ . "/../Loading/Schemas/" . $collectionName;
    }

    public static function getAllETLTablesInfo(bool $sortedByDependencies = false)
    {
        $allCollectionNames = self::getAllTableCollectionNames();
        return self::getTablesInfoFromTableCollections($allCollectionNames, $sortedByDependencies);
    }

    public static function hasExpectedSchema()
    {
        $expectedUserTablesColumns = self::getExpectedTablesColumns();

        foreach ($expectedUserTablesColumns as $table => $columns) {
            foreach ($columns as $column) {
                if (!Capsule::schema()->hasColumn($table, $column)) {
                    return false;
                }
            }
        }

        return true;
    }

    public static function validateCurrentDatabaseStructure()
    {
        $userHasTables = count(Capsule::select("SHOW TABLES")) > 0;

        if (!$userHasTables) {
            die(ConsoleOutput::printMessage('error_empty_db'));
        }

        $hasExpectedSchema = self::hasExpectedSchema();

        if (!$hasExpectedSchema) {
            die(ConsoleOutput::printMessage('error_table_issue'));
        }
    }

    private static function getExpectedTablesColumns()
    {
        $expectedUserTablesColumns = [];
        $allTablesInfo = self::getAllETLTablesInfo();

        foreach ($allTablesInfo as $tableInfo) {
            $tableName = $tableInfo["tableName"];
            $tableColumns = array_keys($tableInfo["columns"]);
            // hotfix
            $tableColumns = array_diff($tableColumns, [""]);
            $expectedUserTablesColumns[$tableName] = $tableColumns;
        }

        return $expectedUserTablesColumns;
    }
}
