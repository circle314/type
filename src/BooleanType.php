<?php

namespace Circle314\Component\Type;

use Circle314\Component\Type\Primitive\AbstractPrimitiveBooleanType;
use Circle314\Component\Type\TypeTrait\NonNullableTypeTrait;

/**
 * Boolean Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class BooleanType extends AbstractPrimitiveBooleanType
{
    use NonNullableTypeTrait;

    #region Constructor

    /**
     * BooleanType constructor.
     *
     * @param $value
     * @throws Exception\TypeValidationException
     * @throws Exception\ValueOutOfBoundsException
     */
    public function __construct($value)
    {
        $this->validateNonNullable($value);
        parent::__construct($value);
    }
    #endregion
}