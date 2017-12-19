<?php

namespace Circle314\Component\Type;

use Circle314\Component\Type\Primitive\AbstractPrimitiveStringType;
use Circle314\Component\Type\TypeTrait\NonNullableTypeTrait;

/**
 * String Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class StringType extends AbstractPrimitiveStringType
{
    use NonNullableTypeTrait;

    #region Constructor
    /**
     * StringType constructor.
     *
     * @param $value
     * @param null $minLength The minimum length of the string. Set to null for no minimum. Default value is null
     * @param null $maxLength The maximum length of the string. Set to null for no maximum. Default value is null
     * @throws Exception\TypeValidationException
     * @throws Exception\ValueOutOfBoundsException
     */
    public function __construct($value, $minLength = null, $maxLength = null)
    {
        $this->validateNonNullable($value);
        parent::__construct($value, $minLength, $maxLength);
    }
    #endregion
}