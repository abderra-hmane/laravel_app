<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Store the subscriber's email in the database
        Subscriber::create($data);

        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}
