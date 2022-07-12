<?php

namespace Arch\School\Academic\Domain;


class EventPubllisher
{

    private array $subscribers;

    public function addSubscriber(EventSubscriber $subscriber): void
    {
        $this->subscribers[] = $subscriber;
    }

    public function notify(Event $event)
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->process($event);
        }

    }
}