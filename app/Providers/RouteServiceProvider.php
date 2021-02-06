<?php

namespace Uccello\Core\Providers;

use App\Providers\RouteServiceProvider as DefaultRouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Uccello\Core\Models\Domain;
use Uccello\Core\Models\Module;

/**
 * Route Service Provider
 */
class RouteServiceProvider extends DefaultRouteServiceProvider
{
    /**
     * @inheritDoc
     */
    public function boot()
    {
        parent::boot();

        // Bind domain
        Route::bind('domain', function ($value) {
            if (preg_match('`^[0-9]+$`', $value)) { // By id
                $domain = Domain::findOrFail($value);
            } else { // By slug
                $domain = Domain::where('slug', $value)->first() ?? abort(404);
            }
            return $domain;
        });

        // Bind module
        Route::bind('module', function ($value) {
            if (preg_match('`^[0-9]+$`', $value)) { // By id
                $module = Module::findOrFail($value);
            } else { // By name
                $module = Module::where('name', $value)->first() ?? abort(404);
            }
            return $module;
        });
    }
}
