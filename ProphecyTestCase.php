<?php

namespace Prophecy\PHPUnit;

use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophet;

class ProphecyTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Prophet
     */
    private $prophet;

    protected function prophesize($classOrInterface = null)
    {
        if (null === $this->prophet) {
            throw new \LogicException(sprintf('The setUp method of %s must be called to initialize Prophecy.', __CLASS__));
        }

        return $this->prophet->prophesize($classOrInterface);
    }

    protected function setUp()
    {
        $this->prophet = new Prophet();
    }

    protected function assertPostConditions()
    {
        $this->prophet->checkPredictions();
    }

    protected function tearDown()
    {
        $this->prophet = null;
    }

    protected function onNotSuccessfulTest(\Exception $e)
    {
        if ($e instanceof PredictionException) {
            $e = new \PHPUnit_Framework_AssertionFailedError($e->getMessage(), $e->getCode(), $e);
        }

        return parent::onNotSuccessfulTest($e);
    }
}
