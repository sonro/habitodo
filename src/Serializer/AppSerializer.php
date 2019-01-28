<?php

namespace App\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

abstract class AppSerializer
{
    /**
     * @var Serializer
     */
    private $serilizer;

    protected $normalizers;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];

        $this->serilizer = new Serializer($this->normalizers, $encoders);
    }

    /**
     * Serializes data in the appropriate format.
     *
     * @param mixed  $data    Any data
     * @param string $format  Format name
     * @param array  $context Options normalizers/encoders have access to
     *
     * @return string
     */
    public function serialize($data, $format, array $context = array())
    {
        return $this->serilizer->serialize($data, $format, $context);
    }

    /**
     * Deserializes data into the given type.
     *
     * @param mixed  $data
     * @param string $type
     * @param string $format
     * @param array  $context
     *
     * @return object
     */
    public function deserialize($data, $type, $format, array $context = array())
    {
        return $this->serilizer->deserialize($data, $type, $format, $context);
    }
}
