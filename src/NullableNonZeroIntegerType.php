<?php

namespace Circle314\Component\Type;

use Circle314\Component\Type\TypeTrait\NonZeroNumericTypeTrait;

/**
 * Nullable Non-zero Integer Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class NullableNonZeroIntegerType extends NullableIntegerType
{
    use NonZeroNumericTypeTrait;

    #region Constructor
    /**
     * NullableNonZeroIntegerType constructor.
     *
     * @param $value
     * @param null $minValue The minimum value of the number. Set to null for no minimum. Default value is null
     * @param null $maxValue The maximum value of the number. Set to null for no maximum. Default value is null
     */
    public function __construct($value, $minValue = null, $maxValue = null)
    {
        $this->validateNonZeroNumeric($value);
        parent::__construct($value, $minValue, $maxValue);
    }
    #endregion
}