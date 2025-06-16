<?php

return [
    'error_empty_db' => "" .
        "[ERROR] It seems your database is empty.\n" .
        "Please make sure to use the `builder.php` script first." .
        str_repeat(PHP_EOL, 2),

    'error_table_issue' => "\n" .
        "[ERROR] It seems there is an issue with your database setup. " .
        "It may be outdated.\n" .
        "Please try rebuilding it using the `builder.php` script." .
        str_repeat(PHP_EOL, 2),

    'necessary_rebuild_msg' => "" .
        "It seems that your database is missing some table(s) or column(s).\n" .
        "Rebuilding is required." .
        str_repeat(PHP_EOL, 2),

    'offer_rebuild_msg' => "" .
        "It looks like you already have all the tables you need.\n" .
        "Do you want to rebuild your database? (Y/N): ",

    'either_yes_no' => "" .
        "Please enter either 'Y' or 'N': ",

    'db_connection_timeout' => str_repeat(PHP_EOL, 3) .
        "[ERROR] An error occurred: Connection timed out.\n",

    'exiting_script' => "" .
        "[INFO] Exiting the script..." .
        str_repeat(PHP_EOL, 1),

    'wiping_db' => "[INFO] Wiping database..." .
        str_repeat(PHP_EOL, 2) .
        str_repeat('_', 50) .
        str_repeat(PHP_EOL, 2),

    'spacing_lines' => "" .
        str_repeat('_', 45) .
        str_repeat(PHP_EOL, 2),
];
