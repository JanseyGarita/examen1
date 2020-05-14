<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class routes_controller extends Controller
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

    public function get_login()
    {
        return view('login');
    }

    public function get_profiles()
    {
        $users = App\Profile::all();
        return view('profiles', compact('users'), $this->get_active_nav_item(1));
    }
    public function get_profile()
    {

        $profile = App\Profile::find($_COOKIE['user']);
        // return $profile->all();
        return view('profile', compact('profile'), $this->get_active_nav_item(0));
        // return view('profile', compact('profile'), $this->get_active_nav_item(0));
        //return view('profile', $this->get_active_nav_item(0));
    }

    public function get_view_profile($id)
    {
        $profile = App\Profile::find($id);
        return view('profile', compact('profile'), $this->get_active_nav_item(0));
    }

    public function get_videos()
    {
        $videos = App\Video::where('id_profile', '=', $_COOKIE['user'])->get()->map(function ($user) {
            return collect($user)->only(['id_video', 'url']);
        });;
        return view('videos', compact('videos'), $this->get_active_nav_item(2));
    }
}
