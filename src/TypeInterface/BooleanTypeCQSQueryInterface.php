<?php

namespace Circle314\Component\Type\TypeInterface;

interface BooleanTypeCQSQueryInterface extends TypeCQSQueryInterface
{
    public function formatInteger(): ?int;
    public function formatYesNo(): string;
}