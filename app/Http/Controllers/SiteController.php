<?php

namespace App\Http\Controllers;

use App\Mail\WorksOfUsersMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('livewire.users-works')->extends('layouts.user');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'title'          => ['required', 'string', 'max:50'],
            'description'    => ['required', 'string', 'max:500'],
            'photo'          => ['required', 'image|max:1024'],
            'schema'         => ['image|max:1024']
        ]);
    }

    public function send(Request $data)
    {
        $data = array(
            'name'       => $data->name,
            'email'      => $data->email,
            'subject'    => $data->subject,
            'message'    => $data->message,
            'photo'      => $data->photo,
            'schema'     => $data->schema
        );

        Mail::to("borashek@inbox.ru")->send(new WorksOfUsersMail($data));
    }
}
