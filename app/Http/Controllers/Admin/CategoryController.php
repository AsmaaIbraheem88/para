<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\CategoryDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Response;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(CategoryDatatable $category) {
		return $category->render('admin.categories.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		$data = $this->validate(request(),
			[
				'name'     => 'required',
			]);
		
		Category::create($data);
		session()->flash('success','Record Added');
		return redirect(aurl('categories'));
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
		
		$category = Category::findOrFail($id);
	
		return view('admin.categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		$data = $this->validate(request(),
		[
			'name'     => 'required',
		]);

		Category::where('id', $id)->update($data);
		session()->flash('success', 'Record Updated');
		return redirect(aurl('categories'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$category = Category::findOrFail($id);
		$count = $category->projects()->count();
		if (!$count)
		{
			$category->delete();

			session()->flash('success','Record Deleted');
			return redirect(aurl('categories'));
			
		}

		session()->flash('error', 'You Can Not Delete'.$category->name);
		return redirect(aurl('categories'));
	}




	public function multi_delete() {

		if (is_array(request('item'))) {

			foreach(request('item') as $item){

				$category = Category::findOrFail($item);
				$count = $category->projects()->count();
				if (!$count)
				{
					$category->delete();
					session()->flash('success','Record Deleted');
				}else{
					session()->flash('error', 'You Can Not Delete'.$category->name);
				}
				
			}
			
		} 

		return redirect(aurl('categories'));
	}



}


