<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface NumericTypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return NumericTypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return NumericTypeCQSQueryInterface
     */
    public function asQueriesOnly();
}