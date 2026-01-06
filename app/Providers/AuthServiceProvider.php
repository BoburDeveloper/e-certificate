<?php
namespace App\Providers;
use App\Models\Certificate;
use App\Models\User;
use App\Policies\CertificatePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    //protected $policies = [
        // Certificate::class => CertificatePolicy::class,
    //];
    
    public function boot() {
    
    Gate::define('edit-certificate', function (User $user, Certificate $certificate) {
        return $certificate->user_id == $user->id or $user->role=='admin';
    });    
        
    }
    

}
