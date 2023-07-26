<?php declare(strict_types=1);

namespace Prophecy\PhpUnit;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use Prophecy\Exception\Doubler\DoubleException;
use Prophecy\Exception\Doubler\InterfaceNotFoundException;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;

/**
 * @mixin TestCase
 */
trait ProphecyTrait
{
    /**
     * @var Prophet|null
     *
     * @internal
     */
    private static $prophet;

    /**
     * @var bool
     *
     * @internal
     */
    private $prophecyAssertionsCounted = false;

    /**
     * @throws DoubleException
     * @throws InterfaceNotFoundException
     *
     * @psalm-param class-string|null $classOrInterface
     * @not-deprecated
     */
    protected static function prophesize(?string $classOrInterface = null): ObjectProphecy
    {
        if (self::$prophet === null) {
            self::$prophet = new Prophet();
        }

        return self::$prophet->prophesize($classOrInterface);
    }

    /**
     * @preCondition
     */
    protected function registerProphecy()
    {
        static $isPhpUnit9;
        $isPhpUnit9 = $isPhpUnit9 ?? method_exists(__CLASS__, 'recordDoubledType');

        if (! $isPhpUnit9) {
            // PHPUnit 10.1
            $this->registerFailureType(PredictionException::class);
        } elseif (\is_string($classOrInterface)) {
            // PHPUnit 9
            \assert($this instanceof TestCase);
            $this->recordDoubledType($classOrInterface);
        }
    }

    /**
     * @postCondition
     */
    protected function verifyProphecyDoubles(): void
    {
        if (self::$prophet === null) {
            return;
        }

        try {
            self::$prophet->checkPredictions();
        } catch (PredictionException $e) {
            throw new AssertionFailedError($e->getMessage());
        } finally {
            $this->countProphecyAssertions();
        }
    }

    /**
     * @after
     */
    protected function tearDownProphecy(): void
    {
        if (null !== self::$prophet && !$this->prophecyAssertionsCounted) {
            // Some Prophecy assertions may have been done in tests themselves even when a failure happened before checking mock objects.
            $this->countProphecyAssertions();
        }

        self::$prophet = null;
    }

    /**
     * @internal
     */
    private function countProphecyAssertions(): void
    {
        \assert($this instanceof TestCase);
        $this->prophecyAssertionsCounted = true;

        foreach (self::$prophet->getProphecies() as $objectProphecy) {
            foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                foreach ($methodProphecies as $methodProphecy) {
                    \assert($methodProphecy instanceof MethodProphecy);

                    $this->addToAssertionCount(\count($methodProphecy->getCheckedPredictions()));
                }
            }
        }
    }
}
