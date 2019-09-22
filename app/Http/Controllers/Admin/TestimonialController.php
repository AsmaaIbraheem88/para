<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\TestimonialDatatable;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Response;

use Image;

class TestimonialController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(TestimonialDatatable $testimonial) {
		return $testimonial->render('admin.testimonials.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.testimonials.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		 $this->validate($request,[
				
				'client_image'    => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
				'photo'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
				'client_comment'    => 'required',
			]);
		
		$testimonial = Testimonial::create($request->all());

		if($request->hasFile('client_image')){

			$image = $request->file('client_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(200, 200)->save( public_path('/uploads/testimonials/'.$filename ) );
			$testimonial->client_image = $filename;
			
		}

		if($request->hasFile('photo')){

			$image = $request->file('photo');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(390, 330)->save( public_path('/uploads/testimonials/'.$filename ) );
			$testimonial->photo = $filename;
			
		}

		
		$testimonial->save();
		
		session()->flash('success','Record Added');
		return redirect(aurl('testimonials'));
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
		
		$testimonial = Testimonial::findOrFail($id);
	
		return view('admin.testimonials.edit', compact('testimonial'));
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
				
			'client_image'    => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'photo'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
			'client_comment'    => 'required',
		]);
	
		$testimonial = Testimonial::findOrFail($id);
		$testimonial->update($request->all());

		if($request->hasFile('client_image')){

			$image = $request->file('client_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(200, 200)->save( public_path('/uploads/testimonials/'.$filename ) );
			$testimonial->client_image = $filename;
			
		}

		if($request->hasFile('photo')){

			$image = $request->file('photo');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(390, 330)->save( public_path('/uploads/testimonials/'.$filename ) );
			$testimonial->photo = $filename;
			
		}

		
		$testimonial->save();
	
		session()->flash('success','Record Added');
		return redirect(aurl('testimonials'));


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$testimonial = Testimonial::findOrFail($id);
		$testimonial->delete();
		Storage::delete('public/testimonials/'. $testimonial->client_image);
		Storage::delete('public/testimonials/'. $testimonial->photo);
		session()->flash('success','Record Deleted');
		return redirect(aurl('testimonials'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {

			foreach(request('item') as $item){
				$testimonial = Testimonial::findOrFail($item);
				$testimonial->delete();
				Storage::delete('public/testimonials/'. $testimonial->client_image);
				Storage::delete('public/testimonials/'. $testimonial->photo);
			}

			
		} else {
			$testimonial = Testimonial::findOrFail(request('item'));
			$testimonial->delete();
			Storage::delete('public/testimonials/'. $testimonial->client_image);
			Storage::delete('public/testimonials/'. $testimonial->photo);
		}
		session()->flash('success', 'Record Deleted');
		return redirect(aurl('testimonials'));
	}


	
}


