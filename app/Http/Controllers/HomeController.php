<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class HomeController extends Controller implements MustVerifyEmail
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
      
        return view('home');
    }

    public function getEmailForVerification(): string {
        
    }

    public function hasVerifiedEmail(): bool {
        
    }

    public function markEmailAsVerified(): bool {
        
    }

    public function sendEmailVerificationNotification(): void {
        
    }

}
