<?php

namespace App\Providers;


use App\Policies\EventPolicy;
use App\Policies\IdeaboxPolicy;
use App\Policies\ManagementPolicy;
use App\Event;
use App\Post;
use App\User;


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
        'App\Model' => 'App\Policies\ModelPolicy',
        Event::class => EventPolicy::class,
        Post::class => IdeaboxPolicy::class,
        User::class => ManagementPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
