<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Section;


class SectionController extends Controller {

	public function section_view(Request $request) {
		
		if (Section::all()->count() > 0) {
            $sections = Section::find(1);
        }else{
			$sections =  Section::create($request->all());
		}

        
        return view('admin.sections.sections', compact('sections'));
		
	}

	public function section_save(Request $request ) {

		
		 	$this->validate($request, [
				'team' => 'required',
				'testimonials' => 'required',
				'interesting' => 'required',
				'clients' => 'required',

			
			]);

			
			if (Section::all()->count() > 0) {
				$sections = Section::find(1);
				$sections->update($request->all());
	

			} else {
				Section::create($request->all());
			}

			
	
			session()->flash('success', 'Record Updated');
			return redirect(aurl('sections'));
       
	}
}
