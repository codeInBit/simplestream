<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimetableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $startTime = $this->start_time;
        $endTime = $this->end_time;
        return [
            'start_time' => $startTime,
            'end_time' => $endTime,
            'channel' => new ChannelResource($this->whenLoaded('channel')),
            'programme' => new ProgrammeResource($this->whenLoaded('programme')),
        ];
    }
}
