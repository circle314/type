<?php

namespace Circle314\Component\Type\TypeTrait;

use Circle314\Component\Type\Exception\TypeValidationException;

/**
 * Numeric Type trait
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
trait NumericTypeTrait
{
    #region Private Methods
    /**
     * Validates a value as nullable numeric
     *
     * @param $value
     * @throws TypeValidationException
     */
    private function validateNumeric($value)
    {
        if(is_null($value) || is_numeric($value)) {
            // Acceptable values
        } else {
            throw new TypeValidationException('Attempted to pass non-numeric value to numeric type');
        }
    }
    #endregion
}