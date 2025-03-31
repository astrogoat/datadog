<?php

namespace Astrogoat\Datadog;

use Astrogoat\Datadog\Settings\DatadogSettings;
use Helix\Lego\Apps\App;
use Helix\Lego\Apps\AppPackageServiceProvider;
use Helix\Lego\Apps\Services\IncludeFrontendViews;
use Spatie\LaravelPackageTools\Package;

class DatadogServiceProvider extends AppPackageServiceProvider
{
    public function registerApp(App $app): App
    {
        return $app
            ->name('datadog')
            ->settings(DatadogSettings::class)
            ->includeFrontendViews(function (IncludeFrontendViews $views) {
                return $views->addToBody('datadog::script');
            })
            ->migrations([
                __DIR__ . '/../database/migrations',
                __DIR__ . '/../database/migrations/settings',
            ])
            ->backendRoutes(__DIR__.'/../routes/backend.php')
            ->frontendRoutes(__DIR__.'/../routes/frontend.php');
    }

    public function configurePackage(Package $package): void
    {
        $package->name('datadog')->hasConfigFile()->hasViews();
    }
}
