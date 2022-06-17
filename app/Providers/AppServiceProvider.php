<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(app()->environment('production'))
        {
            URL::forceScheme('https');
        } else {
            DB::listen(function($query) {
                Log::info(
                    $query->sql,
                    $query->bindings,
                    $query->time
                );
            });
            Mail::alwaysTo('syaidahtul.aziz@gmail.com');
        }

        Blueprint::macro('entityHistory', function()
        {
            $this->timestamp('created_at')->useCurrent();
            $this->unsignedBigInteger('created_by')->nullable();
            $this->timestamp('updated_at')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->timestamp('deleted_at')->nullable();
            $this->unsignedBigInteger('deleted_by')->nullable();
        });

    }
}
