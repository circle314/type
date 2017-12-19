<?php

namespace Circle314\Component\Type;

use Circle314\Component\Type\Primitive\AbstractPrimitiveNumericType;
use Circle314\Component\Type\TypeTrait\NonNullableTypeTrait;

/**
 * Numeric Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class NumericType extends AbstractPrimitiveNumericType
{
    use NonNullableTypeTrait;

    #region Constructor
    /**
     * NumericType constructor.
     *
     * @param $value
     * @param null $minValue The minimum value of the number. Set to null for no minimum. Default value is null
     * @param null $maxValue The maximum value of the number. Set to null for no maximum. Default value is null
     * @throws Exception\TypeValidationException
     * @throws Exception\ValueOutOfBoundsException
     */
    public function __construct($value, $minValue = null, $maxValue = null)
    {
        $this->validateNonNullable($value);
        parent::__construct($value, $minValue, $maxValue);
    }
    #endregion
}