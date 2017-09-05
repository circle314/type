<?php

namespace Circle314\Component\Type\TypeTrait;

use Circle314\Component\Type\Exception\TypeValidationException;

/**
 * Non-empty String Type trait
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
trait NonEmptyStringTypeTrait
{
    #region Private Methods
    /**
     * Validates a value as a nullable non-empty string
     *
     * @param $value
     * @throws TypeValidationException
     */
    private function validateNonEmptyString($value)
    {
        if(is_null($value)) {
            // Nulls are acceptable at this stage
        } else if((string)$value === '') {
            throw new TypeValidationException('Attempted to pass empty string value to non-empty string type');
        }
    }
    #endregion
}