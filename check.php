<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once 'src/Utils/get_time_diff.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Utils\ConsoleOutput;

use function Src\Utils\getTimeDiffFormatted;

$db = getenv('DB_DATABASE');

$groupLeadTable = [
    ### group => tableName
    'pessoas' => 'pessoas',
    'graduacao' => 'graduacoes',
    'posGraduacao' => 'posgraduacoes',
    'pesquisasAvancadas' => 'pesquisas_avancadas',
    'servidores' => 'vinculos_servidores',
    'ceu' => 'cursos_culturaextensao',
    'programasUSP' => 'auxilios_concedidos',
    'questSocioEcon' => 'questionario_respostas',
    'lattes' => 'lattes'
];

$query = Capsule::table('mysql.innodb_table_stats')
    ->selectRaw(
        "table_name
        ,CONVERT_TZ(last_update, @@session.time_zone, '+00:00') as last_update_utc"
    )
    ->where('database_name', $db)
    ->whereIn('table_name', array_values($groupLeadTable))
    ->where('n_rows', '>', 0)
    ->get();

$lastUpdates = [];
foreach ($groupLeadTable as $group => $tableName) {
    $r = $query->firstWhere('table_name', $tableName);

    $timeDiff = $r?->last_update_utc !== null
        ? getTimeDiffFormatted($r?->last_update_utc)
        : null;

    $lastUpdates[$group] = $timeDiff;
}

ConsoleOutput::echoNewlines(1);

$texts = [];
foreach ($lastUpdates as $script => $timeDiff) {
    $timeLabel = $timeDiff !== null ? ($timeDiff . ' ago') : 'No available data';
    $texts[] = str_pad("<$script.php>", 30, '.', STR_PAD_RIGHT) . " : {$timeLabel}";
}

ConsoleOutput::prettyPrint($texts);
