<?php
namespace App\Policies;

use App\Models\Certificate;
use App\Models\User;

class CertificatePolicy
{
    public function edit(User $user, Certificate $certificate): bool
    {
        return $certificate->user_id == $user->id or $user->role=='admin';
    }
}
