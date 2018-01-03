<?php

namespace Circle314\Component\Type\Primitive;

use \DateTime;
use Circle314\Component\Type\TypeInterface\DateTimeTypeCQSCommandInterface;
use Circle314\Component\Type\TypeInterface\DateTimeTypeCQSQueryInterface;
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
     * @param $value
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
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
                (
                    (string)(float)$value === $value ||
                    (string)(int)$value === $value
                ) &&
                ($value <= PHP_INT_MAX) &&
                ($value >= ~PHP_INT_MAX)
            ) {
                // UNIX Timestamp as a string
                $this->value = DateTime::createFromFormat("U.u", $value);
            } else if(
                (
                    (float)$value === $value ||
                    (int)$value === $value
                ) &&
                ($value <= PHP_INT_MAX) &&
                ($value >= ~PHP_INT_MAX)
            ) {
                // UNIX Timestamp as an integer
                $this->value = DateTime::createFromFormat("U.u", $value);
            } else if($value === 'now') {
                $this->value = DateTime::createFromFormat("U.u", microtime(true));
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
     * @return DateTimeTypeCQSCommandInterface
     */
    public function asCommandsOnly()
    {
        return $this;
    }

    /**
     * @return DateTimeTypeCQSQueryInterface
     */
    public function asQueriesOnly()
    {
        return $this;
    }

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
    final public function format($format): ?string
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
    final public function hasPassed(DateTime $dateTime = null): bool
    {
        $dateTime = $dateTime ?: DateTime::createFromFormat("U.u", microtime(true));
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