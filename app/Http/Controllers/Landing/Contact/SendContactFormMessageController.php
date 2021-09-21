<?php

namespace App\Http\Controllers\Landing\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SendContactFormMessageController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:10'],
        ]);
        dd($request->request);
    }
}
