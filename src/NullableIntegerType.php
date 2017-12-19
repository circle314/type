<?php

namespace Circle314\Component\Type;

/**
 * Nullable Integer Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class NullableIntegerType extends NullableNumericType
{
    #region Constructor
    /**
     * NullableIntegerType constructor.
     *
     * @param $value
     * @param null $minValue The minimum value of the number. Set to null for no minimum. Default value is null
     * @param null $maxValue The maximum value of the number. Set to null for no maximum. Default value is null
     * @throws Exception\TypeValidationException
     * @throws Exception\ValueOutOfBoundsException
     */
    public function __construct($value, $minValue = null, $maxValue = null)
    {
        parent::__construct(
            is_null($value) ? null : (int)$value,
            is_null($minValue) ? null : (int)$minValue,
            is_null($maxValue) ? null : (int)$maxValue
        );
    }
    #endregion
}