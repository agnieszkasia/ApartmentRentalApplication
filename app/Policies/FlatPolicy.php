<?php

namespace App\Policies;

use App\User;
use App\Flat;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlatPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any flats.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the flat.
     *
     * @param  \App\User  $user
     * @param  \App\Flat  $flat
     * @return mixed
     */
    public function view(User $user, Flat $flat)
    {
        //
    }

    /**
     * Determine whether the user can create flats.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the flat.
     *
     * @param  \App\User  $user
     * @param  \App\Flat  $flat
     * @return mixed
     */
    public function update(User $user, Flat $flat)
    {
        return $user->id == $flat->user_id;
    }

    /**
     * Determine whether the user can delete the flat.
     *
     * @param  \App\User  $user
     * @param  \App\Flat  $flat
     * @return mixed
     */
    public function delete(User $user, Flat $flat)
    {
        //
    }

    /**
     * Determine whether the user can restore the flat.
     *
     * @param  \App\User  $user
     * @param  \App\Flat  $flat
     * @return mixed
     */
    public function restore(User $user, Flat $flat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the flat.
     *
     * @param  \App\User  $user
     * @param  \App\Flat  $flat
     * @return mixed
     */
    public function forceDelete(User $user, Flat $flat)
    {
        //
    }
}
