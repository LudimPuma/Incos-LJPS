<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocentePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index(User $user)
    {
        dd('Index policy applied');
        return $user->can('crud-index-teacher');
    }

    public function create(User $user)
    {
        return $user->can('crud-create-teacher');
    }

    public function show(User $user)
    {
        return $user->can('crud-show-teacher');
    }

    public function edit(User $user)
    {
        return $user->can('crud-edit-teacher');
    }

}
