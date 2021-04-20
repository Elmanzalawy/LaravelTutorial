<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


// only authenticated users will be able to listen on the chat channel. So, we need a way to authorize that the currently authenticated user can actually listen on the channel.
Broadcast::channel('chat', function ($user) {
    return Auth::check(); //returns true or false depending on whether is authenticated or not
  });
