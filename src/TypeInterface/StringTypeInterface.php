<?php

namespace Circle314\Component\Type\TypeInterface;

/**
 * String Type interface
 *
 * @package     Circle314\Component\Type
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/type
 */
interface StringTypeInterface extends TypeInterface
{
    public function formatLowerCase();
    public function formatUpperCase();
    public function getMinLength();
    public function getMaxLength();
}