<?php

namespace App\Serializer;

class TodoistNormalizer extends AppNormalizer
{
    public function __construct()
    {
        $this->taskAppString = 'todoist';
        parent::__construct();
    }
}
