<?php

namespace App\Serializer;

class PriorityConvertor
{
    public function convertToApp(int $priority, string $taskAppName)
    {
        if ($taskAppName === 'habitica') {
            switch ($priority) {
                case 1:
                    return '1';
                case 2:
                    return '1.5';
                default:
                    return '2';
            }
        }

        return $priority;
    }

    public function convertFromApp($priority, string $taskAppName)
    {
        if ($taskAppName === 'habitica') {
            if ($priority === '2') {
                return 3;
            } elseif ($priority === '1.5') {
                return 2;
            }

            return 1;
        }

        return $priority;
    }
}
