<?php

namespace Circle314\Component\Type\Exception;

use \Exception;

/**
 * Intended to be thrown when a Type class cannot validate the input value against the classes declared type
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class TypeValidationException extends Exception
{
}