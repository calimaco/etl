<?php

namespace Src\Transformation;

class Mapper
{
    protected array $fieldTransformMap;

    public function __construct(array $fieldTransformMap)
    {
        $this->fieldTransformMap = $fieldTransformMap;
    }

    public function mapping(array $record): array
    {
        $mappedRecord = [];

        foreach ($this->fieldTransformMap as $mappedField => $sourceMapping) {
            if (is_callable($sourceMapping)) {
                $mappedRecord[$mappedField] = $sourceMapping($record);
            } elseif (is_string($sourceMapping)) {
                $mappedRecord[$mappedField] = $record[$sourceMapping] ?? null;
            }
        }

        return $mappedRecord;
    }
}
