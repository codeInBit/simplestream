<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Channel;
use Tests\TestCase;

class ChannelControllerTest extends TestCase
{
    protected $channel_uuid;

    public function setUp(): void
    {
        parent::setUp();
        $this->channel_uuid = Channel::inRandomOrder()->value('uuid');
    }
    /**
     * Test to get all channels
     *
     * @return void
     */
    public function testGetChannels()
    {
        $response = $this->getJson('api/channels');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'success',
                    'data',
                    'message'
                ]
            );
    }

    /**
     * Test to get programme timetable
     *
     * @return void
     */
    public function testGetProgrammeTimetable()
    {
        $today = now()->toDateString();
        $response = $this->getJson("api/channels/$this->channel_uuid/$today/timezone/UTC");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'success',
                    'data',
                    'message'
                ]
            );
    }

    /**
     * Test to get programme timetable with invalid channel uuid
     *
     * @return void
     */
    public function testGetProgrammeTimetableWithInvalidChannelUuid()
    {
        $today = now()->toDateString();
        $response = $this->getJson("api/channels/0p70f9e4-58ac-3407-a09d-ba965a0aa98j/$today/timezone/UTC");

        $response->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(
                [
                    'success',
                    'message'
                ]
            );
    }
}
