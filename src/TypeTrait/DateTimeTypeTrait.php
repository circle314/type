<?php

namespace Circle314\Component\Type\TypeTrait;

use \DateTime;
use \Exception;
use Circle314\Component\Type\Exception\TypeValidationException;

/**
 * DateTime Type trait
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
trait DateTimeTypeTrait
{
    #region Private Methods
    /**
     * Validates a value as a nullable value that can be cast to DateTime
     *
     * @param $value
     * @throws TypeValidationException
     */
    private function validateDateTime($value)
    {
        try {
            if(
                is_a($value, DateTime::class)
                || is_null($value)
            ) {
                // Correct type, no need to attempt conversion
            } else {
                if(
                    ((string)(int)$value === $value)
                    && ($value <= PHP_INT_MAX)
                    && ($value >= ~PHP_INT_MAX)
                ) {
                    // UNIX Timestamp as a string
                    new DateTime(date("c", $value));
                } else if(
                    ((int)$value === $value)
                    && ($value <= PHP_INT_MAX)
                    && ($value >= ~PHP_INT_MAX)
                ) {
                    // UNIX Timestamp as an integer
                    new DateTime(date("c", (int)$value));
                } else {
                    // Try making a DateTime with whatever remains
                    new DateTime($value);
                }
            }
        } catch (Exception $e) {
            throw new TypeValidationException('Attempted to pass non-date[time] value to date[time] type');
        }
    }
    #endregion
}