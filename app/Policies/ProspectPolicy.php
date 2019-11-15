<?php

namespace App\Policies;

use App\User;
use App\Prospect;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProspectPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any prospects.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function allProspects()
    {
        return Auth::User()->isSuperAdmin() || Auth::User()->isAdmin();
    }

    public function myProspects()
    {
        return Auth::User()->isAgent();
    }



    public function viewAny(User $user)
    {
        
    }


    /**
     * Determine whether the user can view the prospect.
     *
     * @param  \App\User  $user
     * @param  \App\Prospect  $prospect
     * @return mixed
     */
    public function view(User $user, Prospect $prospect)
    {
        //
    }

    /**
     * Determine whether the user can create prospects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the prospect.
     *
     * @param  \App\User  $user
     * @param  \App\Prospect  $prospect
     * @return mixed
     */
    public function update(User $user, Prospect $prospect)
    {
        return $user->id === $prospect->user_id;
    }

    /**
     * Determine whether the user can delete the prospect.
     *
     * @param  \App\User  $user
     * @param  \App\Prospect  $prospect
     * @return mixed
     */
    public function delete(User $user, Prospect $prospect)
    {
        //
    }

    /**
     * Determine whether the user can restore the prospect.
     *
     * @param  \App\User  $user
     * @param  \App\Prospect  $prospect
     * @return mixed
     */
    public function restore(User $user, Prospect $prospect)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the prospect.
     *
     * @param  \App\User  $user
     * @param  \App\Prospect  $prospect
     * @return mixed
     */
    public function forceDelete(User $user, Prospect $prospect)
    {
        //
    }
}
