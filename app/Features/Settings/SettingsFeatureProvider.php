<?php

namespace App\Features\Settings;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SettingsFeatureProvider extends ServiceProvider
{
    public $featureName = "Settings";

    public $featureNameLower = "settings";

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->mapRoutes();
        $this->loadConfigurations();
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }


    /**
     * map routes
     */
    public function mapRoutes(): void
    {
        Route::prefix('/api/' . Str::plural($this->featureNameLower))
            ->middleware('auth:sanctum')
            ->group(__DIR__ . '/Routes/sanctum.php');

        Route::prefix('/api/' . Str::plural($this->featureNameLower))
            ->group(__DIR__ . '/Routes/guest.php');
    }

    /**
     * Load feature configurations.
     */
    public function loadConfigurations(): void
    {
        $featureConfigFiles = File::files(__DIR__ . '/Config');
        foreach ($featureConfigFiles as $splFile) {
            list($name, $extenssion) = explode('.', $splFile->getFilename());
            $path = $splFile->getRealPath();
            $this->mergeConfigFrom($path, 'features.' . $name);
        }
    }
}
