<?php

namespace App\Events;

class LogEvent extends Event
{

    /**
     * @var array data
     */
    public array $data;

    /**
     * __construct
     *
     * @param array data
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
