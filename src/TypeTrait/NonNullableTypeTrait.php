<?php

namespace Circle314\Component\Type\TypeTrait;

use Circle314\Component\Type\Exception\TypeValidationException;

/**
 * Non-nullable Type trait
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
trait NonNullableTypeTrait
{
    #region Private Methods
    /**
     * Validates a value as non-null
     *
     * @param $value
     * @throws TypeValidationException
     */
    private function validateNonNullable($value)
    {
        if(is_null($value)) {
            throw new TypeValidationException('Attempted to pass null value to non-null type');
        }
    }
    #endregion
}