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
     * @return object
     */
    public function timetable(object $channel, string $date, string $timezone): object
    {
        $formattedDate = date('Y-m-d', strtotime($date));
        $timetable = $channel->timetables()->whereDate('date', $formattedDate)
            ->where('timezone', $timezone)
            ->with(['programme'])->get();

        return $timetable;
    }
}
