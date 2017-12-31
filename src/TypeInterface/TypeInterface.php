<?php

namespace Circle314\Component\Type\TypeInterface;

/**
 * Generic Type interface
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
interface TypeInterface extends
    TypeCQSCastingInterface,
    TypeCQSCommandInterface,
    TypeCQSQueryInterface
{

}