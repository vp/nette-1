<?php

use Tester\Assert;
use UniMapper\Nette\Tests\Model\Entity;

require __DIR__ . '/../bootstrap.php';

/**
 * @testCase
 */
class ExtensionTest extends Tester\TestCase
{

    /** @var \Nette\DI\Container */
    private $container;

    public function __construct(Nette\DI\Container $container)
    {
        $this->container = $container;
    }

    public function testCustomQueries()
    {
        Assert::type("UniMapper\Nette\Tests\Model\Query\Custom", Entity\Simple::query()->custom());
    }

    public function testEntityIteratorOptions()
    {
        Assert::equal(
            [
                'public' => TRUE,
                'defined' => FALSE,
                'computed' => FALSE,
                'excludeNull' => FALSE,
            ],
            \UniMapper\Entity\Iterator::$ITERATE_OPTIONS
        );
    }

}

$testCase = new ExtensionTest($configurator->createContainer());
$testCase->run();