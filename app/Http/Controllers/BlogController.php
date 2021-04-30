<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d['blogpost'] = Blog::all();
        return view('blog.index', $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $c['category'] =  Category::all();
        return view('blog.create', $c);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store
        $blogPost = new Blog;
        $blogPost->title = $request->input('title');
        $blogPost->description = $request->input('description');
        $blogPost->category_id = $request->input('category');
        $blogPost->user_id = 0;
        if($blogPost->save()){
           $photo = $request->file('image');
           if($photo != null){
               $ext = $photo->getClientOriginalExtension();
               $fileName = rand(10000, 50000).'.'. $ext;
               if($ext == 'jpg' || $ext == 'png'){
                   if($photo->move(public_path(), $fileName)){
                       $blogPost = Blog::find($blogPost->id);
                       $blogPost->featured_image_url = url('/').'/'. $fileName;
                       $blogPost->save();
                   }
               }

           }
           // dd($blogPost);
           return redirect()->route('blogpost.index')->with('success', 'Blog post information saved successfully!');
       }
       return redirect()->back()->with('failed', 'Blog post information could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
       abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $c['category'] = Category::all();
        $c['blog'] = Blog::find($id);
        return view('blog.edit', $c);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blogPost = Blog::find($id);
        $blogPost->title = $request->input('title');
        $blogPost->description = $request->input('description');
        $blogPost->category_id = $request->input('category');
        $blogPost->user_id = 0;
        if($blogPost->save()){
           $photo = $request->file('image');
           if($photo != null){
               $ext = $photo->getClientOriginalExtension();
               $fileName = rand(10000, 50000).'.'. $ext;
               if($ext == 'jpg' || $ext == 'png'){
                   if($photo->move(public_path(), $fileName)){
                       $blogPost = Blog::find($blogPost->id);
                       $blogPost->featured_image_url = url('/').'/'. $fileName;
                       $blogPost->save();
                   }
               }
            }
            return redirect()->route('blogpost.index')->with('success', 'Blog post information saved successfully!');
        }
        return redirect()->back()->with('failed', 'Blog post information could not save!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Blog::destroy($id))
        {
            return redirect()->back()->with('success', 'Deleted successfully');
        }
        return redirect()->back()->with('failed', 'Could not delete');
    }
}
