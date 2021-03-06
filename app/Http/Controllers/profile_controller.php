<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class profile_controller
{

    function get_active_nav_item($item)
    {
        $output = [
            ['profiles' => '', 'profile_class' => 'active', 'watch' => ''],
            ['profiles' => 'active', 'profile_class' => '', 'watch' => ''],
            ['profiles' => '', 'profile_class' => '', 'watch' => 'active']
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


    function get_video_id($URL)
    {
        $YouTubeCheck = preg_match('![?&]{1}v=([^&]+)!', $URL . '&', $Data);
        if ($YouTubeCheck) {
            $VideoID = $Data[1];
        }
        return $VideoID;
    }

    function delete_video($id)
    {
        App\Video::where('id_video', $id)->delete();
        return redirect()->back();
    }

    function insert_video(Request $request)
    {
        $request->validate([
            'url' => 'required'
        ]);

        $video = new App\Video;
        $video->url = $this->get_video_id($request->url);
        $video->id_profile = $_COOKIE['user'];

        $video->save();
        return back();
    }

    function insert_profile(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'user_password' => 'required'
        ]);

        $profile = new App\Profile;
        $profile->user_name = $request->user_name;
        $profile->phone = $request->phone;
        $profile->mail = $request->mail;
        $profile->user_password = $request->user_password;

        $profile->save();
        setcookie('user', $profile->id, time() + (24 * 60 * 60));
        return view('profile', compact('profile'), $this->get_active_nav_item(0));
    }

    function search_profiles(Request $request){
        $profiles = App\Profile::where('user_name', 'like', '%'.$request->search.'%')
        ->get();
        return view('profiles', compact('users'), $this->get_active_nav_item(1, 'false', false));
    }

    function login(Request $data)
    {
        //Obtener el id del usuario        
        $user = App\Profile::where([
            ['mail', '=', $data->user_mail],
            ['user_password', '=', $data->user_password],
        ])->limit(1)->get();

        if (count($user) == 0) {
            return view('login', ['message' => true]); //
        } else {
            //Set the cookie
            setcookie('user', $user[0]['id'], time() + (24 * 60 * 60));
            $profile = App\Profile::find($user[0]['id']);
            //return view
            return view('profile', compact('profile'), $this->get_active_nav_item(0));
        }
    }

    function logout()
    {
        setcookie('user', '', time() - 1000);
        unset($_COOKIE['user']);
        return view('login');
    }
}
