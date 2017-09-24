<?php

namespace Lara\Listeners;

use Session;

class UpdateUserListener
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
        $user = $event->user;
        $data = $event->data;
        if($user->update($data)){
            Session::flash('message-success', __('admin/messages.update-ok',['name' => $user->name]));
        }
    }
}
