<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        /* If necessary, you may define the path where Passport's keys should be loaded from. You may use the Passport::loadKeysFrom method to accomplish 
        this. Typically, this method should be called from the boot method of your application's App\Providers\AuthServiceProvider class: */
        Passport::loadKeysFrom(__DIR__ . '/../secrets/oauth');

        /* If you would like your client's secrets to be hashed when stored in your database, you should call the Passport::hashClientSecrets method in the
         boot method of your App\Providers\AuthServiceProvider class: */
        Passport::hashClientSecrets();
    }
}
