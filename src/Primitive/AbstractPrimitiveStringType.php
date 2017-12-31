<?php

namespace Circle314\Component\Type\Primitive;

use \Exception;
use Circle314\Component\Type\TypeInterface\StringTypeCQSCommandInterface;
use Circle314\Component\Type\TypeInterface\StringTypeCQSQueryInterface;
use Circle314\Component\Type\TypeInterface\StringTypeInterface;

/**
 * Abstract primitive string type. Extend this class to create concrete string types
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
abstract class AbstractPrimitiveStringType extends AbstractPrimitiveType implements StringTypeInterface
{
    #region Properties
    /** @var int */
    private $maxLength;

    /** @var int */
    private $minLength;
    #endregion

    #region Constructor
    /**
     * AbstractPrimitiveStringType constructor.
     *
     * @param $value
     * @param null $minLength The minimum length of the string. Set to null for no minimum. Default value is null
     * @param null $maxLength The maximum length of the string. Set to null for no maximum. Default value is null
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    public function __construct($value, $minLength = null, $maxLength = null)
    {
        $this->value = is_null($value) ? null : (string)$value;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        parent::__construct($value);
    }
    #endregion

    #region Magic Methods
    /**
     * Gets the current value as a string.
     *
     * @return string|null
     */
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
     * @return StringTypeCQSCommandInterface
     */
    public function asCommandsOnly()
    {
        return $this;
    }

    /**
     * @return StringTypeCQSQueryInterface
     */
    public function asQueriesOnly()
    {
        return $this;
    }

    /**
     * Returns the maximum length of the string
     *
     * @return int|null
     */
    final public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }

    /**
     * Returns the minimum length of the string
     *
     * @return int|null
     */
    final public function getMinLength(): ?int
    {
        return $this->minLength;
    }

    /**
     * Returns the string value
     *
     * @return string
     */
    final public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value in lower case
     *
     * @return string
     */
    final public function formatLowerCase(): ?string
    {
        if(is_null($this->value)) {
            return $this->value;
        } else {
            return strtolower($this->value);
        }
    }

    /**
     * Returns the value in upper case
     *
     * @return null|string
     */
    final public function formatUpperCase(): ?string
    {
        if(is_null($this->value)) {
            return $this->value;
        } else {
            return strtoupper($this->value);
        }
    }

    /**
     * Checks if the length of the string is within bounds
     *
     * @param $value mixed The string value
     * @return bool
     */
    final protected function valueInBounds($value)
    {
        return is_null($value) || (
            (is_null($this->getMinLength()) || strlen($value) >= $this->getMinLength())
            &&
            (is_null($this->getMaxLength()) || strlen($value) <= $this->getMaxLength())
        );
    }
}