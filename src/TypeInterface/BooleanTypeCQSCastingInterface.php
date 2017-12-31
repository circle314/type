<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface BooleanTypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return BooleanTypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return BooleanTypeCQSQueryInterface
     */
    public function asQueriesOnly();
}