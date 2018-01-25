<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $post = Post::find($request->post_id);

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->approved = true;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;

        $comment->save();

        Session::flash('success', 'Comment has been submitted successfully!');

        return redirect()->route('blog.single', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = Comment::find($id);
      return view('comments.edit', ['comment' => $comment]);
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
      $this->validate($request, [
        'comment' => 'required'
      ]);

      $comment = Comment::find($id);
      $post_id = $comment->post_id;

      $comment->comment = $request->comment;
      $comment->save();

      Session::flash('success', 'Comment has been updated successfully!');

      return redirect()->route('posts.show', $post_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $comment->delete();

        Session::flash('success', 'Comment has been deleted successfully!');

        return redirect()->route('posts.show', $post_id);
    }

    public function delete($id) {
      $comment = Comment::find($id);
      return view('comments.delete', ['comment' => $comment]);
    }
}
