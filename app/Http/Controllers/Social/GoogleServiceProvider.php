<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class GoogleServiceProvider extends AbstractServiceProvider
{
    //
    public function handle()
    {
        /*$user = $this->provider->fields([
            'first_name',
            'last_name',
            'email',
            'gender',
            'verified',
        ])->user();*/

        $user = $this->provider->user();

        $existingUser = User::where('settings->google_id', $user->id)->first();

        if ($existingUser) {
            $settings = $existingUser->settings;

            if (! isset($settings['google_id'])) {
                $settings['google_id'] = $user->id;
                $existingUser->settings = $settings;
                $existingUser->save();
            }

            return $this->login($existingUser);
        }

        $newUser = $this->register([
            'name' => $user->name,
            'email' => $user->email,
            'settings' => [
                'google_id' => $user->id,
            ]
        ]);

        return $this->login($newUser);
    }
}
