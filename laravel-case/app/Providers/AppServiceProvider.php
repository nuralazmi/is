<?php

namespace App\Providers;

use App\Models\OrderItem;
use App\Observers\OrderItemObserver;
use Dedoc\Scramble\Scramble;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;
use Illuminate\Support\ServiceProvider;
use Dedoc\Scramble\Support\Generator\Parameter;

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
        Scramble::extendOpenApi(function (OpenApi $openApi) {
            $openApi->secure(
                SecurityScheme::http('bearer'),
            );
            foreach ($openApi->paths as $path => $pathItem) {
                foreach ($pathItem->operations as $operation) {
                    $operation->parameters[] = new Parameter(
                        'Accept-Language',
                        'header',
                    );
                }
            }
        });

        OrderItem::observe(OrderItemObserver::class);
    }
}
