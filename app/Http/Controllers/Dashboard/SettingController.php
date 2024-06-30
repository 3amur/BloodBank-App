<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(){
        $records = Setting::all();
        return view('dashboard.settings.index', compact('records'));
    }

    public function edit(Request $request ,Setting $setting ,$id){
        $record = $setting->findOrFail($id);
        return view('dashboard.settings.edit', compact('record'));
    }

    public function update(Request $request ,Setting $setting ,$id){
        $data = $request->validate([
            'notification_settings_text' => 'string|min:3|max:1000',
            'about_app' => 'string|min:3|max:2000',
            'phone' => 'string|min:3|max:15',
            'email' => 'email|min:3|max:30',
            'fb_link' => 'string',
            'tw_link' => 'string',
            'insta_link' => 'string',
            'you_link' => 'string',
        ]); 
        $record = $setting->findOrFail($id);
        $record->update($data);

        flash()->success('Settings updated successfully');
        return redirect()->back();
    }
}
