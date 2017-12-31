<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface TypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return TypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return TypeCQSQueryInterface
     */
    public function asQueriesOnly();
}