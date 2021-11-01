<?php

namespace App\Repositories\Channel;

use Illuminate\Http\Request;

interface ChannelInterface
{
    public function timetable(object $channel, string $date, string $timezone): object;
}
