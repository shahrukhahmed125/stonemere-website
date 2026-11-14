<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\View\Composers\SiteSettingsComposer;
use App\Helpers\HtmlSanitizerHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings with all views
        View::composer('*', SiteSettingsComposer::class);

        // Register safe HTML directive
        Blade::directive('safeHtml', function ($expression) {
            return "<?php echo \\App\\Helpers\\HtmlSanitizerHelper::sanitize({$expression}); ?>";
        });
    }
}
