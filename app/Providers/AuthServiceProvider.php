<?php

namespace App\Providers;

use App\Prospect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update', 'ProspectPolicy@update');
        Gate::define('allProspects', 'App\Policies\ProspectPolicy@allProspects');
        Gate::define('create', 'App\Policies\ProspectPolicy@create');
    }
}
