<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class profile_controller
{

    function get_active_nav_item($item)
    {
        $output = [
            ['profiles' => '', 'profile' => 'active', 'videos' => ''],
            ['profiles' => 'active', 'profile' => '', 'videos' => ''],
            ['profiles' => '', 'profile' => '', 'videos' => 'active']
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
        return back();
    }

     function insert_video(Request $request){
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

}
