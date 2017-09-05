<?php

namespace Circle314\Component\Type\Exception;

use \Exception;

/**
 * Intended to be thrown when the input value of a Type class falls outside the given bounds of the class
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
class ValueOutOfBoundsException extends Exception
{
}