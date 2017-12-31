<?php

namespace Circle314\Component\Type\TypeInterface;

use \DateTime;

interface DateTypeCQSQueryInterface extends TypeCQSQueryInterface
{
    public function format($format): string;
    public function hasPassed(DateTime $dateTime = null): bool;
}