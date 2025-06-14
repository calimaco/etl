<?php

namespace Src\Utils;

require_once __DIR__ . "/../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Loading\DbHandle\DatabaseManager;
use Src\Utils\TableSorter;

class BuilderUtils
{
    public static function getAllTableGroups()
    {
        return [
            'PessoasTables',
            'GraduacaoTables',
            'PosGraduacaoTables',
            'PesquisasAvancadasTables',
            'CEUTables',
            'ServidoresTables',
            'ProgramasUSPTables',
            'QuestSocioEconTables',
            'LattesTables',
        ];
    }

    public static function getTablesNamesFromTableGroups(
        array $group,
        bool $sortedByDependencies = false
    ) {
        $tablesNames = [];

        $tablesProperties = self::getTablesInfoFromTableGroups($group, $sortedByDependencies);

        foreach ($tablesProperties as $tableProperties) {
            $tablesNames[] = $tableProperties['tableName'];
        }

        return $tablesNames;
    }

    public static function getTableGroupPath(string $groupName)
    {
        return __DIR__ . "/../Loading/SchemaBuilder/Tables/" . $groupName;
    }

    public static function getTablesInfoFromTableGroups(
        array $groups,
        bool $sortedByDependencies = false
    ) {
        $tablesInfo = [];

        foreach ($groups as $group) {
            $groupPath = self::getTableGroupPath($group);
            $files = glob("$groupPath/*.php");
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

    public static function getAllETLTablesInfo(bool $sortedByDependencies = false)
    {
        $allGroups = self::getAllTableGroups();
        return self::getTablesInfoFromTableGroups($allGroups, $sortedByDependencies);
    }

    public static function validateCurrentDatabaseStructure(bool $isTryingToLoad)
    {
        $expectedUserTablesColumns = self::getExpectedTablesColumns();
        $actualUserTables = Capsule::schema()->getTables();
        $missingColumnFound = false;

        foreach ($expectedUserTablesColumns as $table => $columns) {
            if (!Capsule::schema()->hasColumns($table, $columns)) {
                $missingColumnFound = true;
            };
        }

        if ($isTryingToLoad) {
            if (empty($actualUserTables)) {
                die(ConsoleOutput::printMessage('error_empty_db'));
            } elseif ($missingColumnFound) {
                die(ConsoleOutput::printMessage('error_table_issue'));
            } else {
                return;
            }
        }

        return $missingColumnFound;
    }

    public static function setupDatabase(bool $forceRebuild)
    {
        $requestingRebuild = false;
        $missingColumnFound = self::validateCurrentDatabaseStructure(false);

        if ($forceRebuild === true) {
            $requestingRebuild = true;
        } elseif ($missingColumnFound === false) {
            $requestingRebuild = self::offerRebuild();
        }

        $decision = self::buildDecision(
            $missingColumnFound,
            $requestingRebuild
        );

        self::buildMessage($decision);
        return self::buildAction($decision);
    }

    private static function offerRebuild()
    {
        ConsoleOutput::printMessage('offer_rebuild_msg');

        $response = strtoupper(trim(fgets(STDIN)));

        while (true) {
            if ($response === 'Y') {
                return true;
            } elseif ($response === 'N') {
                ConsoleOutput::printMessage('exiting_script');
                return false;
            } else {
                ConsoleOutput::printMessage('either_yes_no');
                $response = strtoupper(trim(fgets(STDIN)));
            }
        }
    }

    private static function buildDecision(bool $missingColumnFound, bool $requestingRebuild)
    {
        if (empty(Capsule::schema()->getTables())) {
            return 'first build';
        } elseif ($missingColumnFound) {
            return 'necessary rebuild';
        } elseif ($requestingRebuild) {
            return 'optional rebuild';
        } else {
            ConsoleOutput::echoNewlines(1);
            die();
        }
    }

    private static function buildMessage(string $decision)
    {
        ConsoleOutput::echoNewlines(1);

        switch ($decision) {
            case "necessary rebuild":
                ConsoleOutput::printMessage('necessary_rebuild_msg');
                break;
        }

        return;
    }

    private static function buildAction(string $decision)
    {
        $tableGroups = self::getAllTableGroups();
        $dbManager = new DatabaseManager();

        if ($decision === 'first build') {
            $dbManager->buildDB($tableGroups);
            return true;
        }
        if (strpos($decision, 'rebuild')) {
            $dbManager->rebuildDB($tableGroups);
            return true;
        } else {
            return false;
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
