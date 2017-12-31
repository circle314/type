<?php

namespace Circle314\Component\Type\TypeInterface;

use Circle314\Component\CQS\CQSCastingInterface;

interface DateTimeTypeCQSCastingInterface extends CQSCastingInterface
{
    /**
     * @return DateTimeTypeCQSCommandInterface
     */
    public function asCommandsOnly();

    /**
     * @return DateTimeTypeCQSQueryInterface
     */
    public function asQueriesOnly();
}