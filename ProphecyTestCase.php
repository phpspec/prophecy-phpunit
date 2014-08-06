<?php

namespace Prophecy\PhpUnit;

use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophet;

abstract class ProphecyTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Prophet
     */
    private $prophet;

    /**
     * @param string|null $classOrInterface
     * @return \Prophecy\Prophecy\ObjectProphecy
     * @throws \LogicException
     */
    protected function prophesize($classOrInterface = null)
    {
        return $this->getProphet()->prophesize($classOrInterface);
    }

    protected function assertPostConditions()
    {
        $this->getProphet()->checkPredictions();
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

    /**
     * @return Prophet
     */
    private function getProphet()
    {
        if (null === $this->prophet) {
            $this->prophet = new Prophet();
        }

        return $this->prophet;
    }
}
