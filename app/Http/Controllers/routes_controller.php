<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class routes_controller extends Controller
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
    public function get_profiles()
    {
        return view('profiles', $this->get_active_nav_item(1));
    }
    public function get_profile()
    {
        $profile = App\Profile::find($_COOKIE['user']);
        return view('profile', compact('profile'), $this->get_active_nav_item(0));
        //return view('profile', $this->get_active_nav_item(0));
    }
    public function get_videos()
    {
        return view('videos', $this->get_active_nav_item(2));
    }


    //----------------------------------------------------------------------------------------

    public function get_prueba()
    {
        $profiles = App\Profile::all();
        return view('prueba', compact('profiles'), $this->get_active_nav_item(1));
    }

    public function get_detalle($id)
    {
        $profile = App\Profile::find($id);
        return view('detalle', compact('profile'), $this->get_active_nav_item(0));
    }
    public function get_videos2($id)
    {
        $videos = App\Video::where('id_profile', $id);
        return view('videos2', compact('videos'), $this->get_active_nav_item(2));
    }
    // ------------------------------------------------------------------------------------------------
}
