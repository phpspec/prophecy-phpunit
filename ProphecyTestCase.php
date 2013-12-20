<?php

namespace Prophecy\PhpUnit;

use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
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
        $this->addToAssertionCount($this->countAssertionsMade());
        $this->prophet->checkPredictions();
    }

    protected function countAssertionsMade() {
        $assertionCount = 0;

        foreach($this->prophet->getProphecies() as $prophecy) {
            if ($prophecy instanceof MethodProphecy) {
                $assertionCount++;
            } elseif($prophecy instanceof ObjectProphecy) {
                // Each object prophecy will have a number of promises grouped by
                // the method
                foreach($prophecy->getMethodProphecies() as $singleMethodPromises) {
                    $assertionCount += count($singleMethodPromises);
                }
            }
        }

        return $assertionCount;
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
