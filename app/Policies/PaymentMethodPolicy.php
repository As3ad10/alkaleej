<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PaymentMethod;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentMethodPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PaymentMethod');
    }

    public function view(AuthUser $authUser, PaymentMethod $paymentMethod): bool
    {
        return $authUser->can('View:PaymentMethod');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PaymentMethod');
    }

    public function update(AuthUser $authUser, PaymentMethod $paymentMethod): bool
    {
        return $authUser->can('Update:PaymentMethod');
    }

    public function delete(AuthUser $authUser, PaymentMethod $paymentMethod): bool
    {
        return $authUser->can('Delete:PaymentMethod');
    }

}