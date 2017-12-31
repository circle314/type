<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface IntegerTypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return IntegerTypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return IntegerTypeCQSQueryInterface
     */
    public function asQueriesOnly();
}