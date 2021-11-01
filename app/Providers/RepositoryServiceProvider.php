<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Channel\ChannelInterface;
use App\Repositories\Channel\ChannelRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ChannelInterface::class,
            ChannelRepository::class
        );
    }
}
