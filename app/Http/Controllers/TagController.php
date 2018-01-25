<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    public function __construct() {
      return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tags = Tag::all();
      return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the create new tag form
        //save the form datas in database tags table
        //store a success message
        //redirect to index page and show the success message

        $this->validate($request, [
          'name' => 'required|max:191'
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'New tag has been created successfully');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //take the tag model from tags table with the id
        //pass it to the tags.show view
        $tag = Tag::find($id);
        return view('tags.show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tag = Tag::find($id);
      return view('tags.edit', ['tag' => $tag]);
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
        //validate the form
        //if succeed then retrieve the model using the id and update it and save it
        //store a session message
        //redirect to the tags.show page with session('success')
        $this->validate($request, [
          'name' => 'required|max:191'
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Tag has been updated successfully!');

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success', 'Tag has been deleted successfully!');

        return redirect()->route('tags.index');
    }
}
