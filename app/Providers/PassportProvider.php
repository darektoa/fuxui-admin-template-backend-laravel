<?php

namespace App\Providers;

use App\Models\Passport\{AuthCode, Client, PersonalAccessClient, RefreshToken, Token};
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class PassportProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Passport::enablePasswordGrant();
        Passport::useTokenModel(Token::class);
        Passport::useRefreshTokenModel(RefreshToken::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::useClientModel(Client::class);
        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);

        Passport::scopes([
            '*'
        ]);
    }
}
