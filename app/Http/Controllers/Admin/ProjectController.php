<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ProjectDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Response;
use DB;
use Image;

class ProjectController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProjectDatatable $project) {
		return $project->render('admin.projects.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [

			'name'     => 'required',
			'image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'date'     => 'required|date|date_format:Y-m-d',
			'category_id'=>'required|exists:categories,id',
        ]);
	
		$project = Project::create($request->all());

		if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(360, 380)->save( public_path('/uploads/projects/'.$filename ) );
            $project->image = $filename;

        }

        $project->save();
		

	
		session()->flash('success','Record Added');
		return redirect(aurl('projects'));
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
		
		$project = Project::findOrFail($id);
	
		return view('admin.projects.edit', compact('project'));
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

			'name'     => 'required',
			'image'    => 'required|image|mimes:jpeg,png,jpg,gif',
			'date'     => 'required|date|date_format:Y-m-d',
			'category_id'=>'required|exists:categories,id',
        ]);
	
		$project = Project::findOrFail($id);
		$project->update($request->all());

		if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(360, 380)->save( public_path('/uploads/projects/'.$filename ) );
            $project->image = $filename;

        }

        $project->save();

		
    
		session()->flash('success', 'Record Updated');
		return redirect(aurl('projects'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Project::findOrFail($id)->delete();
		session()->flash('success','Record Deleted');
		return redirect(aurl('projects'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			Project::destroy(request('item'));
		} else {
			Project::findOrFail(request('item'))->delete();
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('projects'));
	}


}


