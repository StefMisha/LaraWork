<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (isset($event->user) && $event->user instanceof User) { //если есть ивент юзер и евент юзер это экземпляр класса Юзер
            $event->user->last_login_at = now(); //обновляем поле последнего входа
            $event->user->save(); //соханим изменения
        }
    }
}
