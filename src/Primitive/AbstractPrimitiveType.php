<?php

namespace Circle314\Component\Type\Primitive;

use Circle314\Component\Type\Exception\ValueOutOfBoundsException;
use Circle314\Component\Type\TypeInterface\TypeInterface;

/**
 * Abstract primitive type. Extend this class to create concrete custom types
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */

abstract class AbstractPrimitiveType implements TypeInterface
{
    #region Properties
    protected $value;
    #endregion

    #region Constructor
    /**
     * AbstractPrimitiveType constructor.
     *
     * @param $value
     * @throws ValueOutOfBoundsException
     */
    public function __construct($value)
    {
        if(!$this->valueInBounds($value)) {
            throw new ValueOutOfBoundsException('Value ' . var_export($value) . ' is out of bounds for ' . static::class);
        }
    }
    #endregion

    #region Abstract Methods
    abstract protected function valueInBounds($value);
    #endregion
}