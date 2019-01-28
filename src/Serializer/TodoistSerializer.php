<?php

namespace App\Serializer;

class TodoistSerializer extends AppSerializer
{
    public function __construct()
    {
        $this->normalizers = [new TodoistNormalizer()];
        parent::__construct();
    }
}
