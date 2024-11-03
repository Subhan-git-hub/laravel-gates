<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        //while making gates it is necessary to use User $user varriable//

        // Gate::before(function(User $user){
        //     echo "before ";//runs before all the gate functions
        // });
        
        Gate::define('Admin', function(User $user){//we created a gate that will check that the user role is admin or not//gives value in true or false//
          return $user->role === 'admin';
          //we can use this condition in blade files or controllers to allow admins to access their property


        });
        Gate::define('profile',function(User $user,$profileid){
            return $user->id === $profileid;//checks if the logged in user id and db table id matches or not//returns true and false
            //hence by using this a user could not see anyone else'e profile except his profile//avoid privacy issues
        });

        Gate::define('update',function(User $user,$updateid){
            //checks if the post id of the user and user_id in the posts table mathces or not//s

        //we are checking that is the post user_id which we are updating (when clicking on the update btn) and user id matches or not
            return $user->id === $updateid;//checks if the logged in user id and db table user id matches or not//returns true and false
        });

        // Gate::after(function(User $user){
        //     echo " after ";//runs after all the gate functions
        // });

      
    }
}
