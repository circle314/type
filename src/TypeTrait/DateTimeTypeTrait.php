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
     * Checks whether a value is a valid UNIX timestamp
     *
     * @param $value
     * @return bool
     */
    private function isUnixTimestamp($value): bool
    {
        return
            (string)(float)$value == (string)$value &&
            ((float)$value <= PHP_INT_MAX) &&
            ((float)$value >= ~PHP_INT_MAX)
            ;
    }

    /**
     * Formats a value as a string in U.u DateTime format
     *
     * @param $value
     * @return string
     */
    private function unixTimestampAsUuFormat($value): string
    {
        return number_format((float)$value, 4, '.', '');
    }

    /**
     * Validates a value as a nullable value that can be cast to DateTime
     *
     * @param $value
     * @throws TypeValidationException
     */
    private function validateDateTime($value): void
    {
        try {
            if(
                is_a($value, DateTime::class) ||
                is_null($value) ||
                $value === 'now'
            ) {
                // Expected and valid values, no need to attempt conversion
            } else {
                if($this->isUnixTimestamp($value)) {
                    // Try making a DateTime with a UNIX Timestamp from a string
                    DateTime::createFromFormat("U.u", $this->unixTimestampAsUuFormat($value));
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