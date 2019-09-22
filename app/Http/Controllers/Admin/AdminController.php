<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\DataTables\UserDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(UserDatatable $admin) {
		return $admin->render('admin.admins.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
            'name' =>'required',
			'email'    => 'required|email|unique:users,email',
            'password'=>'required|confirmed|min:6', 
		]);


        $request->merge(['password'=>bcrypt($request->password)]);
        $record = User::create($request->all());
       

		session()->flash('success', 'Record Added');
		return redirect(aurl('admin'));





		
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
		$admin = User::findOrFail($id);
		return view('admin.admins.edit', compact('admin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		

		$this->validate($request,
		[
			'name'     => 'required',
			'email'    => 'required|email|unique:users,email,'.$id,
			'password' => 'sometimes|nullable|min:6'
		
		]);
	
        $record = User::findOrFail($id);

        $record->name = $request->name;
        $record->email = $request->email;


        if(!empty($request->password))
        {

            $record->password = bcrypt($request->password);

        }


        $record->save();

        session()->flash('success', 'Record Updated');
		return redirect(aurl('admin'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$user = User::findOrFail($id);

		if(admin()->user()){

			session()->flash('error', 'You Can not delete this record');
			return redirect(aurl('admin'));
		}

		$user->delete();
	
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('admin'));
	}




	public function multi_delete() {

		if (is_array(request('item'))) {

			foreach(request('item') as $item){

				$user = User::findOrFail($item);
				if (!admin()->user())
				{
					$user->delete();
					session()->flash('success','Record Deleted');
				}else{
					session()->flash('error', 'You Can Not Delete '.$user->name);
				}
				
			}
			
		} 

		return redirect(aurl('admin'));
	}
}
