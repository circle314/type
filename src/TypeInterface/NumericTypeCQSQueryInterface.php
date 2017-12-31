<?php

namespace Circle314\Component\Type\TypeInterface;

interface NumericTypeCQSQueryInterface extends TypeCQSQueryInterface
{
    public function getMinValue(): ?float;
    public function getMaxValue(): ?float;
}