<?php

namespace App\Serializer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationReader;

abstract class AppNormalizer implements NormalizerInterface
{
    /**
     * @var GetSetMethodNormalizer
     */
    private $normalizer;

    /**
     * @var array
     */
    private $defaultContext;

    /**
     * @var string
     */
    protected $taskAppString;

    public function __construct()
    {
        $this->defaultContext = [
            'groups' => $this->taskAppString,
        ];
        $classMetadataFactory = new ClassMetadataFactory(
            new AnnotationLoader(new AnnotationReader())
        );
        $this->normalizer = new GetSetMethodNormalizer($classMetadataFactory);
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $context = array_merge_recursive($this->defaultContext, $context);
        $data = $this->normalizer->normalize($object, $format, $context);

        return $data;
    }

    public function supportsNormalization($data, $format = null)
    {
        return true;
    }
}
