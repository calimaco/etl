<?php

require_once __DIR__ . "/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Extraction\TempTables\TempManager;
use Src\Loading\DbHandle\DatabaseTasks;
use Src\Loading\SchemaBuilder\Schemas\LattesSchemas;
use Src\Loading\Operations\LattesOps;

$preScripts = ['create_nuspsLattes_temp'];

$schemas = Capsule::schema()->hasTable('lattes') 
         ? [] 
         : [LattesSchemas::class];

$ops = [LattesOps::class];

TempManager::generateTempTables($preScripts);
DatabaseTasks::wipeAndOrUpdateTables($schemas, $ops);