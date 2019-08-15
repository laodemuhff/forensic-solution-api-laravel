<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aturan;
use App\Char;
use App\App;
use Session;
use Purifier;
use Image;
use Storage;


class AturanController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog post in it from the database
        $aturan = Aturan::orderBy('id', 'desc')->paginate(10);
        //return a view and pass in the above variable
        return view('admin.aturan.index')->withAturan($aturan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $app = App::all();
      $char = Char::all();
        return view('admin.posts.create')->withApps($app)->withChars($char);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  validate the data
        $this->validate($request, array(
          'title' => 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id' => 'required|integer',
          'body'  => 'required',
          'featured_image' => 'sometimes|image'
        ));

      // store in the database
      $post = new Aturan;

      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = Purifier::clean($request->body);

      // Save our image
      if ($request->hasFile('featured_image')) {
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/'. $filename);
        Image::make($image)->save($location);

        $post->image =$filename;
      }

      $post->save();

      $post->tags()->sync($request->tags, false);

      Session::flash('success', 'The blog post was succesfully saved!');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Aturan::find($id);
        return view('admin.posts.show')->withAturan($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save that as a variable
        $post = Aturan::find($id);
        $categories = App::all();
        $cats = array();
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }

        $tags = Char::all();
        $tags2 = array();
        foreach ($tags as $tag) {
          $tags2[$tag->id] = $tag->name;
        }
        //return the view and pass in the variablie we previously created
        return view('admin.posts.edit')->withAturan($post)->withCategories($cats)->withChars($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data before we use it
        $post = Aturan::find($id);

        $this->validate($request, array(
          'title' => 'required|max:255',
          'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
          'category_id' => 'required|integer',
          'body'  => 'required',
          'featured_image' => 'image'
        ));

        // Save the data to the SQLiteDatabase
        $post = Aturan::find($id);

        $post->title = $request->input('title');
        $post->slug =$request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
          // add the new photo
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->save($location);
          $oldFilename = $post->image;

          // update the database
          $post->image = $filename;

          //Delete the old photo
          Storage::delete($oldFilename);
        }

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }else {
          $post->tags()->sync(array());
        }



        // set flash data with success message
        Session::flash('success', 'This post was successfully saved.');
        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Aturan::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
