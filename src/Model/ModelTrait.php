<?php

namespace App\Model;

trait ModelTrait
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}
