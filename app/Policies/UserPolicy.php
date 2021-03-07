<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function edit(User $currentUser, User $user){

        if($currentUser->is($user) || $currentUser->authorizeRoles(['admin'])){
            return true;
        }
        return true;
    }

}
