<?php

namespace Circle314\Component\Type;

use Circle314\Component\Type\Primitive\AbstractPrimitiveDateTimeType;
use Circle314\Component\Type\TypeTrait\NonNullableTypeTrait;

/**
 * DateTime Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class DateTimeType extends AbstractPrimitiveDateTimeType
{
    use NonNullableTypeTrait;

    #region Constructor

    /**
     * DateTimeType constructor.
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