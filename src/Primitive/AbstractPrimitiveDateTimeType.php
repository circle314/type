<?php

namespace Circle314\Component\Type\Primitive;

use \DateTime;
use Circle314\Component\Type\TypeTrait\DateTimeTypeTrait;
use Circle314\Component\Type\TypeInterface\DateTimeTypeInterface;

/**
 * Abstract primitive date time type. Extend this class to create concrete date time types
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
abstract class AbstractPrimitiveDateTimeType extends AbstractPrimitiveType implements DateTimeTypeInterface
{
    use DateTimeTypeTrait;

    #region Constructor
    /**
     * AbstractPrimitiveDateTimeType constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->validateDateTime($value);
        if(
            is_a($value, DateTime::class)
            || is_null($value)
        ) {
            $this->value = $value;
        } else {
            if(
                ((string)(int)$value === $value)
                && ($value <= PHP_INT_MAX)
                && ($value >= ~PHP_INT_MAX)
            ) {
                // UNIX Timestamp as a string
                $this->value = new DateTime(date("c", $value));
            } else if(
                ((int)$value === $value)
                && ($value <= PHP_INT_MAX)
                && ($value >= ~PHP_INT_MAX)
            ) {
                // UNIX Timestamp as an integer
                $this->value = new DateTime(date("c", (int)$value));
            } else {
                // Try making a DateTime with whatever remains
                $this->value = new DateTime($value);
            }
        }
        parent::__construct($value);
    }
    #endregion

    #region Magic Methods
    /**
     * Do not use this magic method for DateTime! Instead, use the format($formatString) method
     *
     * @return null
     */
    final public function __toString()
    {
        trigger_error(static::class . ' objects must use the format($format) method instead of __toString()');
        return null;
    }
    #endregion

    #region Public Methods
    /**
     * Gets the current value
     *
     * @return DateTime
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Formats the current value given a formatting string
     *
     * @param $format string The date time format
     * @return null|string
     */
    final public function format($format)
    {
        if(is_null($this->value)) {
            return null;
        } else {
            return $this->value->format($format);
        }
    }

    /**
     * Whether the date time has elapsed
     *
     * @param DateTime|null $dateTime
     * @return bool
     */
    final public function hasPassed(DateTime $dateTime = null)
    {
        $dateTime = $dateTime ?: new DateTime();
        return $this->value < $dateTime;
    }
    #endregion

    #region Protected Methods
    /**
     * Always returns true for primitive datetime type
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