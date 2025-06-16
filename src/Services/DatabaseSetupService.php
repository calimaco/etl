<?php

namespace Src\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Services\SchemaBuilderService;
use Src\Utils\BuilderUtils;
use Src\Utils\ConsoleOutput;

enum DatabaseDecision: string
{
    case FIRST_BUILD = 'first_build';
    case NECESSARY_REBUILD = 'necessary_rebuild';
    case OPTIONAL_REBUILD = 'optional_rebuild';
    case NO_ACTION = 'no_action';
}

class DatabaseSetupService
{
    public static function setup(bool $forceRebuild)
    {
        $hasExpectedSchema = BuilderUtils::hasExpectedSchema();

        $decision = self::decideAction($hasExpectedSchema, $forceRebuild);

        if ($decision === DatabaseDecision::NO_ACTION) {
            ConsoleOutput::echoNewlines(1);
            return false;
        }

        return self::performAction($decision);
    }

    private static function decideAction(bool $hasExpectedSchema, bool $forceRebuild): DatabaseDecision
    {
        $isUserDatabaseEmpty = empty(Capsule::schema()->getTables($_ENV['DB_DATABASE']));

        if ($isUserDatabaseEmpty) {
            return DatabaseDecision::FIRST_BUILD;
        }

        if (!$hasExpectedSchema) {
            return DatabaseDecision::NECESSARY_REBUILD;
        }

        if ($forceRebuild) {
            return DatabaseDecision::OPTIONAL_REBUILD;
        }

        // (Re)build not necessary; offer user to rebuild optionally
        $userWantsRebuild = self::offerRebuildToUser();

        return $userWantsRebuild
            ? DatabaseDecision::OPTIONAL_REBUILD
            : DatabaseDecision::NO_ACTION;
    }

    private static function offerRebuildToUser()
    {
        ConsoleOutput::printMessage('offer_rebuild_msg');

        while (true) {
            $input = strtoupper(trim(fgets(STDIN)));

            if ($input === 'Y') {
                return true;
            }

            if ($input === 'N') {
                ConsoleOutput::printMessage('exiting_script');
                return false;
            }

            ConsoleOutput::printMessage('either_yes_no');
        }
    }

    private static function performAction(DatabaseDecision $decision)
    {
        $schemaBuilder = new SchemaBuilderService();

        ConsoleOutput::echoNewlines(1);

        switch ($decision) {
            case DatabaseDecision::FIRST_BUILD:
                $schemaBuilder->buildDB();
                return true;

            case DatabaseDecision::NECESSARY_REBUILD:
                ConsoleOutput::printMessage('necessary_rebuild_msg');
                $schemaBuilder->rebuildDB();
                return true;

            case DatabaseDecision::OPTIONAL_REBUILD:
                $schemaBuilder->rebuildDB();
                return true;

            default:
                return false;
        }
    }
}
