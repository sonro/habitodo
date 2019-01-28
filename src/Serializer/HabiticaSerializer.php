<?php

namespace App\Serializer;

class HabiticaSerializer extends AppSerializer
{
    public function __construct()
    {
        $this->normalizers = [new HabiticaNormalizer()];
        parent::__construct();
    }
}
