<?php

namespace Tightenco\Presets;

use Illuminate\Support\ServiceProvider;

class PresetsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PresetCommand::class);
        $this->commands([PresetCommand::class]);
    }
}
