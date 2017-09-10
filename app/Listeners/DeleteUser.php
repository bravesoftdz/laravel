<?php

namespace Lara\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DeleteUser
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
     * @param  object $event
     *
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        if(Auth::user()->id == $user->id) {
            return true;
        }
        $user->active = 0;
        $user->deleted_at = Carbon::now();
        $user->save();
    }
}
