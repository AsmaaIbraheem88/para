<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\TeamDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Response;
use Image;

class TeamController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(TeamDatatable $team) {
		return $team->render('admin.team.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.team.create');
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
			'job'     => 'required',
			'image'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
	
		$team = Team::create($request->all());
		if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 330)->save( public_path('/uploads/team/' . $filename ) );
            $team->image = $filename;

        };

        $team->save();

		session()->flash('success','Record Added');
		return redirect(aurl('team'));
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
		
		$team = Team::findOrFail($id);
	
		return view('admin.team.edit', compact('team'));
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
			'job'     => 'required',
			'image'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
	
		$team = Team::findOrFail($id);
		$team->update($request->all());
	

		if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 330)->save( public_path('/uploads/team/' . $filename ) );
            $team->image = $filename;

        };

        $team->save();

	
		session()->flash('success', 'Record Updated');
		return redirect(aurl('team'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Team::findOrFail($id)->delete();
		session()->flash('success','Record Deleted');
		return redirect(aurl('team'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			Team::destroy(request('item'));
		} else {
			Team::findOrFail(request('item'))->delete();
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('team'));
	}



}


