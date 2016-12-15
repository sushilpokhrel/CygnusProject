<?php

namespace App\Http\Controllers;

use App\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
class BlogController extends Controller
{
    public function index(){
        $posts = Posts::all();
        return view('blog',compact('posts'));
    }

    /**
     * @param Request $request
     */
    public function store(){
        $input = Request::capture()->all();
        if(isset($input['picture'])){
            $image = $input['picture'];
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $input['picture'] = $filename;
            Image::make(Request::capture()->file('picture'))->resize(100, 100)->save( public_path('/photos/thumbnail/' . $filename ) );

        }
//        $input['updated_at'] =  Carbon::now();
//        $input['created_at'] = Carbon::now();
        Posts::create($input);
        return redirect('/');


    }
    public function add(){

    }
}
