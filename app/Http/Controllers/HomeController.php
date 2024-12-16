<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'latitude' => 'required',
                'longitude' => 'required',
                'user_name' => 'nullable|string|min:3|max:20',
                'user_phone' => 'nullable|numeric|digits:10',
                'user_address' => 'nullable|string|min:3|max:255',
            ],
            [
                'An image is required' => 'image.required',
                'The file must be an image' => 'image.image',
                'The image must be a file of type: jpeg, png, jpg, gif, svg' => 'image.mimes',
                'The image must not exceed 2 MB' => 'image.max',
                'Latitude is required' => 'latitude.required',
                'Longitude is required' => 'longitude.required',
                'Username must be at least 3 characters' => 'user_name.min',
                'Username must be less than 20 characters' => 'user_name.max',
                'Phone number must be numeric' => 'user_phone.numeric',
                'Phone number must be exactly 10 digits' => 'user_phone.digits',
                'Address must be at least 3 characters' => 'user_address.min',
            ]
        );
    }
}
