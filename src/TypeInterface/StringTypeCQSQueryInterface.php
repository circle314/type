<?php

namespace Circle314\Component\Type\TypeInterface;

interface StringTypeCQSQueryInterface extends TypeCQSQueryInterface
{
    public function formatLowerCase(): ?string;
    public function formatUpperCase(): ?string;
    public function getMinLength(): ?int;
    public function getMaxLength(): ?int;
}