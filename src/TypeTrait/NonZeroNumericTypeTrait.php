<?php

namespace Circle314\Component\Type\TypeTrait;

use Circle314\Component\Type\Exception\TypeValidationException;

/**
 * Non-zero numeric Type trait
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
trait NonZeroNumericTypeTrait
{
    #region Private Methods
    /**
     * Validates a value as nullable non-zero numeric
     *
     * @param $value
     * @throws TypeValidationException
     */
    private function validateNonZeroNumeric($value)
    {
        if(is_null($value)) {
            // Nulls are acceptable here
        } else if($value == 0) {
            throw new TypeValidationException('Attempted to pass zero value to non-zero numeric type');
        }
    }
    #endregion
}