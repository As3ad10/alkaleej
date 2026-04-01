<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PaymentRequestStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentRequestStatusPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PaymentRequestStatus');
    }

    public function view(AuthUser $authUser, PaymentRequestStatus $paymentRequestStatus): bool
    {
        return $authUser->can('View:PaymentRequestStatus');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PaymentRequestStatus');
    }

    public function update(AuthUser $authUser, PaymentRequestStatus $paymentRequestStatus): bool
    {
        return $authUser->can('Update:PaymentRequestStatus');
    }

    public function delete(AuthUser $authUser, PaymentRequestStatus $paymentRequestStatus): bool
    {
        return $authUser->can('Delete:PaymentRequestStatus');
    }

}