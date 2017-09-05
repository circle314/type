<?php

namespace Circle314\Component\Type;

use Circle314\Component\Type\TypeTrait\NonEmptyStringTypeTrait;

/**
 * Non-empty String Type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class NonEmptyStringType extends StringType
{
    use NonEmptyStringTypeTrait;

    #region Constructor
    /**
     * NonEmptyStringType constructor.
     *
     * @param $value
     * @param null $minLength The minimum length of the string. Set to null for no minimum. Default value is null
     * @param null $maxLength The maximum length of the string. Set to null for no maximum. Default value is null
     */
    public function __construct($value, $minLength = null, $maxLength = null)
    {
        $this->validateNonEmptyString($value);
        parent::__construct($value, $minLength, $maxLength);
    }
    #endregion
}