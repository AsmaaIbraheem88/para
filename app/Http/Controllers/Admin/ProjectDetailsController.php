<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ProjectDetailsDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectDetails;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Response;
use Image;

class ProjectDetailsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProjectDetailsDatatable $details,Request $request) {
		
		return $details->render('admin.project_details.index');
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {

		

		return view('admin.project_details.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [

			'image'    => 'required|image|mimes:jpeg,png,jpg,gif',
			'project_id'=>'required|exists:projects,id',
		
		]);
		
	// dd($request->all());
	
		$details = ProjectDetails::create($request->all());

		if($request->hasFile('image')){

			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(360, 380)->save( public_path('/uploads/projects/'.$filename ) );
			$details->image = $filename;
			
		}

		
		$details->save();
		

	
		session()->flash('success','Record Added');
		return redirect(aurl('project-details'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		
		$project = ProjectDetails::findOrFail($id);
	
		return view('admin.project_details.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		$this->validate($request, [

		
			'image'    => 'image|mimes:jpeg,png,jpg,gif',
			'project_id'=>'required|exists:projects,id',
		
		]);
		
	
	
		$details = ProjectDetails::findOrFail($id);
		$details->update($request->all());

		if($request->hasFile('image')){

			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(360, 380)->save( public_path('/uploads/projects/'.$filename ) );
			$details->image = $filename;
			
		}

		
		$details->save();

		
    
		session()->flash('success', 'Record Updated');
		return redirect(aurl('project-details'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		ProjectDetails::findOrFail($id)->delete();
		session()->flash('success','Record Deleted');
		return redirect(aurl('project-details'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			ProjectDetails::destroy(request('item'));
		} else {
			ProjectDetails::findOrFail(request('item'))->delete();
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('project-details'));
	}


}


