<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Settings;
use App\Models\Section;

class FrontController extends Controller
{
    public function index(Request $request) {

        $section = Section::find(1);
       

        if (Settings::all()->count() > 0) {
            $settings = Settings::find(1);
        }else {
            $settings =  Settings::create($request->all());
        }

        $slider = Slider::all();
        $services = Service::all();
        $testimonials = Testimonial::all();
        $categories = Category::all();
        $clients = Client::all();
        $projects = Project::with('category')->where(function($query) use ($request){

            if ($request->has('category_id'))
            {
                $query->where('category_id',$request->category_id);
            }

        })->get();

        
        return view('frontend.index',compact('slider','services','testimonials','categories','projects','clients','settings','section'));

    }


    public function team() {


        $section = Section::find(1);
        if($section->team =='open'){
            if (Settings::all()->count() > 0) {
                $settings = Settings::find(1);
            }else {
                $settings =  Settings::create($request->all());
            }
    
            $team = Team::all();
            $clients = Client::all();
          
            return view('frontend.team',compact('team','clients','settings','section'));
        }else{
            abort(404);
        }

       

    }


    

    public function contact() {

        if (Settings::all()->count() > 0) {
            $settings = Settings::find(1);
        }else {
            $settings =  Settings::create($request->all());
        }

        $section = Section::find(1);

        return view('frontend.contact',compact('settings','section'));

    }

    public function contact_save(Request $request ) {

        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
           
        ]);
        
        Contact::create($request->all());

        session()->flash('success','Thanks To Contact Us');
        return redirect('contact');

    }


    public function show($id) {

        if (Settings::all()->count() > 0) {
            $settings = Settings::find(1);
        }else {
            $settings =  Settings::create($request->all());
        }

        $section = Section::find(1);

        $project = Project::findOrFail($id);

        return view('frontend.show_project',compact('settings','project','section'));

    }





}
