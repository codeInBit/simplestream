<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ChannelResource;
use App\Http\Resources\TimetableResource;
use App\Repositories\Channel\ChannelInterface;
use App\Models\Channel;

class ChannelController extends Controller
{
    /**
     * @var ChannelInterface
     */
    protected $channelInterface;

    /**
     * Create a new class instance.
     *
     * @param  ChannelInterface  $channelInterface
     * @return void
     */
    public function __construct(ChannelInterface $channelInterface)
    {
        $this->channelInterface = $channelInterface;
    }

    /**
     * Get list of all channels sorted by name
     *
     * @return JsonResponse
     */
    protected function channels(): JsonResponse
    {
        $response = ChannelResource::collection(Channel::orderBy('name', 'ASC')->get());

        return $this->successResponse([$response], "All channels", Response::HTTP_OK);
    }

    /**
     * GET Programme timetable for a selected channel, for a specific date and timezone.
     *
     * @param Channel $channel
     * @param string $date
     * @param string $timezone
     * @return JsonResponse
     */
    protected function timeTable(Channel $channel, string $date, string $timezone): JsonResponse
    {
        $timetable = $this->channelInterface->timetable($channel, $date, $timezone);
        $response = TimetableResource::collection($timetable);

        return $this->successResponse($response, "Programme timetable for a channel", Response::HTTP_OK);
    }
}
