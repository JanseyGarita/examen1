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

    function login()
    {

        //Set cookie
        //setcookie('user', 'USER_ID', time() + (24 * 60 * 60));
        setcookie('user', 1, time() + (24 * 60 * 60));
        $profile = App\Profile::find($_COOKIE['user']);
        // return $profile->all();
        return view('profile', compact('profile'), $this->get_active_nav_item(0));

        //Delete cookie
        //setcookie('user', '', time() - 1000);
        //unset($_COOKIE['user']);
        // return view('profile',$this->get_active_nav_item(1));
    }

    function logout()
    {
        /*setcookie('user', '', time() - 1000);
        unset($_COOKIE['user']);*/
        return view('login');
    }
}
