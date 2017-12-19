<?php

namespace Circle314\Component\Type\Primitive;

use \Exception;
use Circle314\Component\Type\TypeInterface\BooleanTypeInterface;

/**
 * Abstract primitive boolean type. Extend this class to create concrete boolean types
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
abstract class AbstractPrimitiveBooleanType extends AbstractPrimitiveType implements BooleanTypeInterface
{
    #region Constructor
    /**
     * AbstractPrimitiveBooleanType constructor.
     *
     * @param $value
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    public function __construct($value)
    {
        $this->value = is_null($value) ? null : (bool)$value;
        parent::__construct($value);
    }
    #endregion

    #region Magic Methods
    /**
     * Gets the current value as a string. For boolean values, this is either 'true' or 'false'
     *
     * @return string|null
     */
    public function __toString()
    {
        if(is_null($this->value)) {
            return null;
        }

        try {
            return $this->value ? 'true' : 'false';
        } catch (Exception $e) {
            trigger_error('Error in ' . __METHOD__ . ' method for ' . static::class);
            return '';
        }
    }
    #endregion

    #region Public Methods
    /**
     * Returns the current value
     *
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the boolean value formatted as the string 'Yes', 'No'
     *
     * @param bool $nullConvertValue The value to convert null values to before parsing out to string. Note this conversion is not permanent. Default value is null
     * @return string
     */
    final public function formatInteger($nullConvertValue = null)
    {
        $convertedValue = is_null($this->value) ? $nullConvertValue : $this->value;
        if(is_null($convertedValue)) {
            return null;
        } else {
            return $convertedValue ? 1 : 0;
        }
    }

    /**
     * Returns the boolean value formatted as the string 'Yes', 'No'
     *
     * @param bool $nullConvertValue The value to convert null values to before parsing out to string. Note this conversion is not permanent. Default value is null
     * @return string
     */
    final public function formatYesNo($nullConvertValue = null)
    {
        $convertedValue = is_null($this->value) ? $nullConvertValue : $this->value;
        if(is_null($convertedValue)) {
            return null;
        } else {
            return $convertedValue ? 'Yes' : 'No';
        }
    }
    #endregion

    #region Protected Methods
    /**
     * Always returns true for primitive boolean type
     *
     * @param $value
     * @return bool
     */
    final protected function valueInBounds($value)
    {
        return true;
    }
    #endregion
}