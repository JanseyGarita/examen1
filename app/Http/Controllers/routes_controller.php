<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class routes_controller extends Controller
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
    public function get_profiles()
    {
        return view('profiles', $this->get_active_nav_item(1));
    }
    public function get_profile()
    {
        return view('profile', $this->get_active_nav_item(0));
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

    public function get_detalle($id_profile)
    {
        $profile = App\Profile::find($id_profile);
        return view('detalle', compact('$profile'), $this->get_active_nav_item(1));
    }
}
