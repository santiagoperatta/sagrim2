<?php

namespace App\Policies;

use App\Models\Expediente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpedientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol=== 2;
    }


	public function asignarNumeroExpediente(User $user): bool
    {
        return $user->rol=== 1;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expediente $vacante): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rol=== 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expediente $expediente): bool
    {
        return $user->id === $expediente->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expediente $expediente): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Expediente $expediente): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Expediente $expediente): bool
    {
        //
    }
}
