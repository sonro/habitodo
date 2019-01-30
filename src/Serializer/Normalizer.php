<?php

namespace App\Serializer;

class Normalizer
{
    private $convertionMap;

    public function __construct(string $convertionFile)
    {
        $this->convertionMap = json_decode(
            file_get_contents($convertionFile),
            true
        );
    }

    public function normalize($object, string $taskAppName)
    {
        $class = get_class($object);
        $objectArray = $object->toArray();

        $converting = isset($this->convertionMap[$taskAppName][$class]);

        if ($converting) {
            $convertionMap = $this->convertionMap[$taskAppName][$class];
            $output = [];
            foreach ($objectArray as $propertyName => $propertyValue) {
                if (isset($convertionMap[$propertyName])) {
                    $output[$convertionMap[$propertyName]] = $propertyValue;
                }
            }
        }

        return $converting ? $output : $objectArray;
    }
}
