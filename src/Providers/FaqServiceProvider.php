<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Providers;

use Illuminate\Support\ServiceProvider;
use Override;

final class FaqServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootProviders();

        $this->bootMigrations();

        $this->bootTranslations();
    }

    #[Override]
    public function register(): void
    {
        $this->registerConfigs();
    }

    private function bootProviders(): void
    {
        //
    }

    private function bootMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    private function bootTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'local-faqs');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../lang');
    }

    private function registerConfigs(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/filament-faqs.php', 'local-faqs');
    }
}
