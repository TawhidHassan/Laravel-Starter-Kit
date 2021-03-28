<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Settings\UpdateGeneralSettingsRequest;

class SettingController extends Controller
{
    /**
     * Show General Settings Page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Backend.settings.general');
    }

      /**
     * Update General Settings
     * @param UpdateGeneralSettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGeneralSettingsRequest $request)
    {
        Setting::updateOrCreate(['name'=>'site_title'],['value'=>$request->get('site_title')]);
        Setting::updateOrCreate(['name'=>'site_description'],['value'=>$request->get('site_description')]);
        Setting::updateOrCreate(['name'=>'site_address'],['value'=>$request->get('site_address')]);
        // Update .env file
        Artisan::call("env:set APP_NAME='". $request->site_title ."'");
        notify()->success('Settings Successfully Updated.','Success');
        return back();
    }

}
