<?php

namespace Src\Transformation;

class Mapper
{
    protected array $fieldMap;

    public function __construct(array $fieldMap)
    {
        $this->fieldMap = $fieldMap;
    }

    public function mapping(array $record): array
    {
        $mapped = [];

        foreach ($this->fieldMap as $targetField => $sourceSpec) {
            if (is_callable($sourceSpec)) {
                $mapped[$targetField] = $sourceSpec($record);
            } elseif (is_string($sourceSpec)) {
                $mapped[$targetField] = $record[$sourceSpec] ?? null;
            }
        }

        return $mapped;
    }
}
