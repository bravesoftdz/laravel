<?php

namespace Lara\Listeners;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DeleteUserListener
{
    /**
     * Create the event listener.
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
            Session::flash('message-error', __('admin/messages.remove-self'));
            return true;
        }
        // $pusher->trigger('laravel', 'my-event', ['message' => 'test']);
        $user->active = 0;
        $user->deleted_at = Carbon::now();
        if ($user->save()){
            Session::flash('message-success', __('admin/messages.remove-ok',['name' => $user->name]));
        }
    }
}
