<?php

namespace Src\Loading\DbHandle;

use Src\Loading\SchemaBuilder\Builder;
use Illuminate\Database\Capsule\Manager as Capsule;

class TableOperations
{
    public function __construct()
    {
        $this->builder = new Builder();
    }

    public function getTablesNames($class)
    {
        $refl = new \ReflectionClass($class);
        $tables = $refl->getConstants();

        return $tables;
    }

    public function createTables($class)
    {
        $tables = $this->getTablesNames($class);

        foreach($tables as $table)
        {
            $this->builder->createTable($table);
        }
    }

    public function dropTables($class)
    {
        $tables = $this->getTablesNames($class);

        foreach($tables as $table)
        {
            $this->builder->dropTable($table);
        }
    }

    public function wipeTables($class)
    {
        $tables = $this->getTablesNames($class);

        foreach($tables as $tableProps)
        {
            Capsule::table($tableProps['tableName'])->delete();
        }
    }

    public function updateTables($class)
    {
        $newclass = new $class;

        $classMethods = get_class_methods($class);

        foreach($classMethods as $method)
        {
            if($method != '__construct') {
                $newclass->{$method}();
            }
        }
    }
}