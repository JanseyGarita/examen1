<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class routes_controller extends Controller
{
    function get_active_nav_item($item, $video_view, $id)
    {
        $output = [
            ['profiles' => '', 'profile_class' => 'active', 'watch' => '', 'isView' => $video_view, 'user' => $id],
            ['profiles' => 'active', 'profile_class' => '', 'watch' => '', 'isView' => $video_view, 'user' => $id],
            ['profiles' => '', 'profile_class' => '', 'watch' => 'active', 'isView' => $video_view, 'user' => $id]
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
        return view('profiles', compact('users'), $this->get_active_nav_item(1, 'false', false));
    }
    public function get_profile()
    {
        $profile = App\Profile::find(json_decode($_COOKIE['user'])->id);

        $profile->user_password = json_decode($_COOKIE['user'])->user_password; 
        return view('profile', compact('profile'), $this->get_active_nav_item(0, 'false', false));
    }

    public function get_view_profile($id)
    {
        $profile = App\Profile::find($id);
        return view('profile', compact('profile'), $this->get_active_nav_item(0, 'false', false));
    }

    public function get_videos()
    {
        $videos = App\Video::where('id_profile', '=', json_decode($_COOKIE['user'])->id)->get()->map(function ($user) {
            return collect($user)->only(['id_video', 'url']);
        });
        return view('videos', compact('videos'), $this->get_active_nav_item(2, 'false', false));
    }

    public function user_view($id)
    {
        $videos = App\Video::where('id_profile', '=', $id)->get()->map(function ($user) {
            return collect($user)->only(['id_video', 'url']);
        });
        $profile = App\Profile::find($id);
        return view('videos', compact('videos'), $this->get_active_nav_item(2, 'true', $profile));
    }
}
