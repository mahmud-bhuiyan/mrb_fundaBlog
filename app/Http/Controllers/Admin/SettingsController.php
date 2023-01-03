<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function settingsIndex()
    {
        $setting = Settings::find(1);
        return view('admin.settings.settingsIndex', compact('setting'));
    }
    public function settingsCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'logo' => 'required',
            'favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Settings::where('id', '1')->first();

        if ($setting) {

            $setting->website_name = $request->website_name;

            if ($request->hasfile('logo')) {

                $destination = 'uploads/settings/' . $setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('logo');
                $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasfile('favicon')) {

                $destination = 'uploads/settings/' . $setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('favicon');
                $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }
            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->save();

            return redirect('admin/settings')->with('message', 'Settings Updated Successfully');
        } else {
            $setting = new Settings;
            $setting->website_name = $request->website_name;

            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasfile('favicon')) {
                $file = $request->file('favicon');
                $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }
            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->save();

            return redirect('admin/settings')->with('message', 'Settings Added Successfully');
        }
    }
}
