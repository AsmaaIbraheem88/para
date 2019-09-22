<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ClientDatatable;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Response;
use Image;

class ClientController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ClientDatatable $client) {
		return $client->render('admin.clients.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		 $this->validate($request,[
				
				'logo'    => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			]);
		
		$client = Client::create($request->all());

		if($request->hasFile('logo')){

			$image = $request->file('logo');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(170, 120)->save( public_path('/uploads/clients/'.$filename ) );
			$client->logo = $filename;
			
		}
		$client->save();
		session()->flash('success','Record Added');
		return redirect(aurl('clients'));
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
		
		$client = Client::findOrFail($id);
	
		return view('admin.clients.edit', compact('client'));
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
				
			'logo'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

	
		$client = Client::findOrFail($id);
		$client->update($request->all());
	

		if($request->hasFile('logo')){

			$image = $request->file('logo');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(170, 120)->save( public_path('/uploads/clients/'.$filename ) );
			$client->logo = $filename;
			
		}
		$client->save();
		session()->flash('success','Record Updated');
		return redirect(aurl('clients'));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Client::findOrFail($id)->delete();
		session()->flash('success','Record Deleted');
		return redirect(aurl('clients'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			Client::destroy(request('item'));
		} else {
			Client::findOrFail(request('item'))->delete();
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('clients'));
	}

}


