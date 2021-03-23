<?php declare(strict_types=1);


namespace App\Services;


use App\Models\User;

class SocialService
{
    public function updateUser($user): bool
    {
       // dd($user);

        $email = $user->getEmail();

//TODO: сделать возможность создания нового пользователя через соцсети, если такого нет в БД
//        if user
//        Auth::login(user)
//else ... register new

        $authUser = User::where('email', $email)->first();

        if($authUser) {
            \Auth::login($authUser);
            $authUser->name = $user->getName();
            $authUser->avatar = $user->getAvatar();

            return $authUser->save();
        }
        return false;
    }
}
