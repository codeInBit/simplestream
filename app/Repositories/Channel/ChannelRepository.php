<?php

namespace App\Repositories\Channel;

use Illuminate\Http\Request;

class ChannelRepository implements ChannelInterface
{
    /**
     * Fetch list of programme timetable based on a channel, date and timezone
     *
     * @param object $channel
     * @param string $date
     * @param string $timezone
     *
     * @return array
     */
    public function timetable(object $channel, string $date, string $timezone): object
    {
        
    }
}
