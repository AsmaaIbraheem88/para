<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use Image;

class SettingsController extends Controller {

	public function setting_view(Request $request) {

		if (Settings::all()->count() > 0) {
            $settings = Settings::find(1);
        }else{
			$settings =  Settings::create($request->all());
		}
        return view('admin.settings.settings', compact('settings'));
		
	}

	public function setting_save(Request $request ) {

		
		 	$this->validate($request, [

				'about_msg'=> 'required', 
				'sitename'=> 'required',
				'email'=> 'required|email', 
				'phone'=> 'required', 
				'address'=> 'required',
				'logo' => 'image|mimes:jpeg,png,jpg,gif', 
				'icon' => 'image|mimes:jpeg,png,jpg,gif', 
				'about_image' => 'image|mimes:jpeg,png,jpg,gif',
			
			]);


			if (Settings::all()->count() > 0) {
				$settings = Settings::find(1);
				$settings->update($request->all());

				if($request->hasFile('logo')){

					$logo = $request->file('logo');
					$filename = time() . '.' . $logo->getClientOriginalExtension();
					Image::make($logo)->resize(160, 70)->save( public_path('/uploads/settings/'.$filename ) );
					$settings->logo = $filename;
					
				}
	
				if($request->hasFile('icon')){
	
					$icon = $request->file('icon');
					$filename = time() . '.' . $icon->getClientOriginalExtension();
					Image::make($icon)->resize(36, 36)->save( public_path('/uploads/settings/'.$filename ) );
					$settings->icon = $filename;
					
				}
	
				if($request->hasFile('about_image')){
	
					$about_image = $request->file('about_image');
					$filename = time() . '.' . $about_image->getClientOriginalExtension();
					Image::make($about_image)->resize(400, 400)->save( public_path('/uploads/settings/'.$filename ) );
					$settings->about_image = $filename;
					
				}
		
				$settings->save();
	

			} else {
				Settings::create($request->all());
			}

	
			session()->flash('success', 'Record Updated');
			return redirect(aurl('settings'));
       
	}
}
