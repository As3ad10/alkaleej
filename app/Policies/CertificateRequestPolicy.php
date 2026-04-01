<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CertificateRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificateRequestPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CertificateRequest');
    }

    public function view(AuthUser $authUser, CertificateRequest $certificateRequest): bool
    {
        return $authUser->can('View:CertificateRequest');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CertificateRequest');
    }

    public function update(AuthUser $authUser, CertificateRequest $certificateRequest): bool
    {
        return $authUser->can('Update:CertificateRequest');
    }

    public function delete(AuthUser $authUser, CertificateRequest $certificateRequest): bool
    {
        return $authUser->can('Delete:CertificateRequest');
    }

}