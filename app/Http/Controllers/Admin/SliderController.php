<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\SliderDatatable;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Response;
use Image;
use File;

class SliderController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(SliderDatatable $slider) {
		return $slider->render('admin.sliders.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.sliders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		 $this->validate($request,[
				
				'image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			]);
		
		$slider = Slider::create($request->all());

		
		if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1519, 700)->save( public_path('/uploads/slider/' . $filename ) );
            $slider->image = $filename;

        };

        $slider->save();
		session()->flash('success','Record Added');
		return redirect(aurl('sliders'));
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
		
		$slider = Slider::findOrFail($id);
	
		return view('admin.sliders.edit', compact('slider'));
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
		]);

	
		$slider = Slider::findOrFail($id);
		$slider->update($request->all());
	

		if($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(null, 700)->save( public_path('/uploads/slider/' . $filename ) );
            $slider->image = $filename;

        };

        $slider->save();
		session()->flash('success','Record Updated');
		return redirect(aurl('sliders'));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$slider = Slider::findOrFail($id);
		$slider->delete();
		// Storage::delete('public/slider/'. $slider->image);
		session()->flash('success','Record Deleted');
		return redirect(aurl('sliders'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {

			foreach(request('item') as $item){
				$slider = Slider::findOrFail($item);
				$slider->delete();
				// Storage::delete('public/slider/'. $slider->image);
			}

			
		} else {
			$slider = Slider::findOrFail(request('item'));
			$slider->delete();
			// Storage::delete('public/slider/'. $slider->image);
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('sliders'));
	}

}


