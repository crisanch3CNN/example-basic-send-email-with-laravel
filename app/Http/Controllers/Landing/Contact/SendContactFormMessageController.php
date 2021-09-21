<?php

namespace App\Http\Controllers\Landing\Contact;

use App\Http\Controllers\Controller;
use App\Notifications\ContactFormNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Validator;

class SendContactFormMessageController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:10'],
        ]);

        Notification::route('mail', 'admin@mail.com')->notify(new ContactFormNotification($data));
        try {
        } catch (\Exception $exception) {
            Log::error($exception);
            return  \redirect()->back()->with(['error' => 'Whoops! por favor intanta mas tarde!']);
        }
        return  \redirect()->back()->with(['succes' => 'Whoops! por favor intanta mas tarde!']);
    }
}
