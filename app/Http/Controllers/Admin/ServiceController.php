<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ServiceDatatable;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Response;
use Image;

class ServiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ServiceDatatable $service) {
		return $service->render('admin.services.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.services.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		 $this->validate($request,[
				
				'image'    => 'required|image|mimes:jpeg,png,jpg,gif',
				'name'    => 'required',
				'description'    => 'required',
			]);
		
		$service = service::create($request->all());

		if($request->hasFile('image')){

			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(360, 260)->save( public_path('/uploads/services/'.$filename ) );
			$service->image = $filename;
			
		}

		
		$service->save();
		session()->flash('success','Record Added');
		return redirect(aurl('services'));
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
		
		$service = Service::findOrFail($id);
	
		return view('admin.services.edit', compact('service'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$this->validate($request,[
				
			'image'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
			'name'    => 'required',
			'description'    => 'required',
		]);
	
		$service = Service::findOrFail($id);
		$service->update($request->all());

		if($request->hasFile('image')){

			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(360, 260)->save( public_path('/uploads/services/'.$filename ) );
			$service->image = $filename;
			
		}

		
		$service->save();
		session()->flash('success','Record Updated');
		return redirect(aurl('services'));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function destroy($id) {
		$service = Service::findOrFail($id);
		$service->delete();
		// Storage::delete('public/services/'. $service->image);
		session()->flash('success','Record Deleted');
		return redirect(aurl('services'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {

			foreach(request('item') as $item){
				$service = Service::findOrFail($item);
				$service->delete();
				// Storage::delete('public/services/'. $service->image);
			}

			
		} else {
			$service = Service::findOrFail(request('item'));
			$service->delete();
			// Storage::delete('public/services/'. $service->image);
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('services'));
	}

}


