<?php

namespace App\Listeners;

use App\Events\BookRegister;
use App\Mail\BookRegisterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BookRegisterListener
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
     * @param  BookRegister  $event
     * @return void
     */
    public function handle(BookRegister $event)
    {
        Mail::to('franklemuspaz@yadex.com')->send(new BookRegisterMail($event->book));
        //dump('listener on Register Book Event');die;
    }
}
