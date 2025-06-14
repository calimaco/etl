<?php

namespace Src\Utils;

use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;

function getTimeDiffInterval(
    ?string $start = null,
    ?string $end = null,
    string $timezone = 'UTC'
): ?DateInterval {
    try {
        $tz = new DateTimeZone($timezone);

        $startDate = $start ? new DateTime($start, $tz) : new DateTime('now', $tz);
        $endDate = $end ? new DateTime($end, $tz) : new DateTime('now', $tz);

        return $startDate > $endDate
            ? $startDate->diff($endDate)
            : $endDate->diff($startDate);
    } catch (Exception $e) {
        return null;
    }
}

function getTimeDiffFormatted(
    ?string $start = null,
    ?string $end = null,
    string $timezone = 'UTC'
): ?string {
    $diff = getTimeDiffInterval($start, $end, $timezone);
    echo ($diff);
    if (!$diff) {
        return null;
    }

    if ($diff->days > 0) {
        return $diff->days . " day(s)";
    }
    if ($diff->h > 0) {
        return $diff->h . " hour(s)";
    }
    if ($diff->i > 0) {
        return $diff->i . " minute(s)";
    }

    return $diff->s . " second(s)";
}
