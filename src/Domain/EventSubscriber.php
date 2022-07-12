<?php

namespace Arch\School\Domain;

abstract class EventSubscriber
{

    public function process(Event $event): void 
    {
        if ($this->knowProcess($event)) {
            $this->reactFrom($event);
        }
    }

    abstract public function knowProcess(Event $event): bool;

    abstract  public function reactFrom(Event $event): void;
}