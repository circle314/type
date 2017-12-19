<?php

namespace Circle314\Component\Type\Primitive;

use \Exception;
use Circle314\Component\Type\TypeInterface\NumericTypeInterface;
use Circle314\Component\Type\TypeTrait\NumericTypeTrait;

/**
 * Abstract primitive numeric type. Extend this class to create concrete numeric types
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
abstract class AbstractPrimitiveNumericType extends AbstractPrimitiveType implements NumericTypeInterface
{
    use NumericTypeTrait;

    #region Properties
    /** @var float */
    private $maxValue;

    /** @var float */
    private $minValue;
    #endregion

    #region Constructor
    /**
     * AbstractPrimitiveNumericType constructor.
     *
     * @param $value
     * @param null $minValue The minimum value of the number. Set to null for no minimum. Default value is null
     * @param null $maxValue The maximum value of the number. Set to null for no maximum. Default value is null
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    public function __construct($value, $minValue = null, $maxValue = null)
    {
        $this->validateNumeric($value);
        $this->value = $value;
        $this->maxValue = $maxValue;
        $this->minValue = $minValue;
        parent::__construct($value);
    }
    #endregion

    #region Magic Methods
    final public function __toString()
    {
        if(is_null($this->value)) {
            return null;
        }

        try {
            return (string)$this->value;
        } catch (Exception $e) {
            trigger_error('Error in ' . __METHOD__ . ' method for ' . static::class);
            return '';
        }
    }
    #endregion

    #region Public Methods
    /**
     * Returns the maximum value this type can take
     *
     * @return float|null
     */
    final public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * Returns the minimum value this type can take
     *
     * @return float|null
     */
    final public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * Returns the current value
     *
     * @return int
     */
    final public function getValue()
    {
        return $this->value;
    }
    #endregion

    #region Protected Methods
    final protected function valueInBounds($value)
    {
        return is_null($value) || (
            (is_null($this->getMinValue()) || $value >= $this->getMinValue())
            &&
            (is_null($this->getMaxValue()) || $value <= $this->getMaxValue())
        );
    }
    #endregion
}