<?php

namespace App\Serializer;

class HabiticaNormalizer extends AppNormalizer
{
    public function __construct()
    {
        $this->taskAppString = 'habitica';
        parent::__construct();
    }
}
