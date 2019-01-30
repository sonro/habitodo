<?php

namespace App\Serializer;

class NameConvertor
{
    private $convertionMap;

    public function __construct(string $convertionFile)
    {
        $this->convertionMap = json_decode(
            file_get_contents($convertionFile),
            true
        );
    }

    public function convertToApp(array $input, string $className, string $taskAppName)
    {
        $converting = isset($this->convertionMap[$taskAppName][$className]);

        if ($converting) {
            $convertionMap = $this->convertionMap[$taskAppName][$className];
            $output = [];
            foreach ($input as $propertyName => $propertyValue) {
                if (isset($convertionMap[$propertyName])) {
                    $output[$convertionMap[$propertyName]] = $propertyValue;
                }
            }
        }

        return $converting ? $output : $input;
    }

    public function convertFromApp(array $input, string $className, string $taskAppName)
    {
        $converting = isset($this->convertionMap[$taskAppName][$className]);

        if ($converting) {
            $convertionMap = $this->convertionMap[$taskAppName][$className];
            $output = [];
            foreach ($input as $appName => $propertyValue) {
                $propertyName = array_search($appName, $convertionMap);
                if ($propertyName !== false) {
                    $output[$propertyName] = $propertyValue;
                }
            }
        }

        return $converting ? $output : $input;
    }
}
