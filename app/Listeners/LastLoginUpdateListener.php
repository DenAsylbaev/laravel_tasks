<?php

namespace App\Listeners;

use App\Events\DefineLoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use App\Models\User;

class LastLoginUpdateListener
{
    // private User $user;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DefineLoginEvent $event)
    {
        // dd($event);
        if ($event instanceof DefineLoginEvent) {
            // dd(Carbon::now()->month);
            // dd($event->user);

            $event->user->last_login_at = (new \DateTime())->format('Y-m-d H:i:s');
            $event->user->save();
        }
    }
}
