<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface DateTypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return DateTypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return DateTypeCQSQueryInterface
     */
    public function asQueriesOnly();
}