<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class profile_controller
{

    function get_active_nav_item($item)
    {
        $output = [
            ['profiles' => '', 'profile_class' => 'active', 'videos' => ''],
            ['profiles' => 'active', 'profile_class' => '', 'videos' => ''],
            ['profiles' => '', 'profile_class' => '', 'videos' => 'active']
        ];
        return $output[$item];
    }


    public function update(Request $request)
    {
        // return $request->all();
        $profile = App\Profile::findOrFail($request->id);

        $profile->user_name = $request->user_name;
        $profile->mail = $request->mail;
        $profile->phone = $request->phone_number;
        $profile->user_password = $request->user_password;
        $profile->save();
        return view('profile', compact('profile'), $this->get_active_nav_item(0));
    }

    function insert_video(Request $request)
    {
        $request->validate([
            'id_profile' => 'required',
            'url' => 'required'
        ]);

        $video = new App\Video;
        $video->url = $request->url;
        $video->id_profile = $request->id_profile;

        $video->save();
        return back();
    }

    function login(Request $data)
    {
        //Obtener el id del usuario        
        $user = App\Profile::whereColumn([
            ['mail', '=', $data->user_mail],
            ['user_password', '=', $data->user_password],
        ])->limit(1)->get();
        $id = 1;
        print_r($user);
        exit();
        /*setcookie('user', $id, time() + (24 * 60 * 60));
        $profile = App\Profile::find($id);*/
        return view('profile', compact('profile'), ['reload' => false], $this->get_active_nav_item(0));
    }

    function logout()
    {
        setcookie('user', '', time() - 1000);
        unset($_COOKIE['user']);
        return view('login');
    }
}
