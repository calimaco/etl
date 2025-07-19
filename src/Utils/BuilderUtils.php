<?php

namespace Src\Utils;

require_once __DIR__ . "/../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Utils\TableSorter;

class BuilderUtils
{
    public static function getAllRoutineNames()
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

    public static function getRoutineTables(
        string|array $routines,
        bool $sortedByDependencies = false
    ) {
        if (is_string($routines)) $routines = [$routines];

        $tablesNames = [];

        $tablesProperties = self::getTablesInfoFromTableCollections($routines, $sortedByDependencies);

        foreach ($tablesProperties as $tableProperties) {
            $tablesNames[] = $tableProperties['tableName'];
        }

        return $tablesNames;
    }

    public static function getRoutineTablesMetadata(
        string|array $routines,
        bool $sortedByDependencies = false
    ) {
        if (is_string($routines)) $routines = [$routines];

        $tablesInfo = [];

        foreach ($routines as $routine) {
            $routineSchemaPath = self::getRoutineSchemaPath($routine);
            $files = glob("$routineSchemaPath/*.php");

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

    private static function getRoutineSchemaPath(string $routine)
    {
        $blueprint = require "src/Blueprints/{$routine}.php";
    }

    public static function getAllETLTablesInfo(bool $sortedByDependencies = false)
    {
        $allCollectionNames = self::getAllTableCollectionNames();
        return self::getTablesInfoFromTableCollections($allCollectionNames, $sortedByDependencies);
    }

    public static function getAllTablesInfo(bool $sortedByDependencies = false)
    {
        $allDomainNames = self::getAllRoutineNames();
        return self::getTablesInfoFromDomains($allDomainNames, $sortedByDependencies);
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

    private static function getExpectedTablesColumns()
    {
        $expectedUserTablesColumns = [];
        $allTablesInfo = self::getAllTablesInfo();

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
