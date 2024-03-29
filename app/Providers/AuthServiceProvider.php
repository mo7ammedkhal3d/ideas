<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
use App\Models\User;
use App\Policies\IdeaPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [  // here we use mapping if we have differnebt name form model + Policy
        // Idea::class => IdeaPermissions::class // thene here we shoud define policy map here
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        // Think of Gate as => permition | simple Role

        // Role
        Gate::define('admin', function(User $user):bool{

            return (bool) $user->is_admin;
        });

        // permission  Here we are using polices inested Gate it more orgized and more manange for a lot of models

        // Gate::define('idea.delete' , function(User $user , Idea $idea){
        //     return  (Gate::allows('admin') || $user->id === $idea->user_id);
        // });

        // Gate::define('idea.edit' , function(User $user, Idea $idea):bool{
        //     return (Gate::allows('admin') || $user->id === $idea->user_id);
        // });
    }
}
