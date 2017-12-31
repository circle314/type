<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface StringTypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return StringTypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return StringTypeCQSQueryInterface
     */
    public function asQueriesOnly();
}