<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Http\Requests;
use App\Http\Requests\StoreArticlePostRequest;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    
	public function __construct()
	{

		$this->middleware('auth');

	}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::orderBy('id', 'desc')
                              ->simplePaginate(5);

        return view('backend.dashboard', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticlePostRequest $request)
    {

        // $file = $request->file('image');
        // $filename = $file->getClientOriginalName(); 
        // $fileExtension = $file->getClientOriginalExtension();


        if($request->hasFile('image')){

            $file = $request->file('image');
            $fileExtension = $file->getClientOriginalExtension();
            $timeNow = date('_Y_m_d_H_i');
            $imageName = $request->input('slug').$timeNow.'.'.$fileExtension;
            
            if($request->file('image')->move(config('app.upload'), $imageName))
            {

                Articles::create([

                'title' => $request->input('title'),
                'slug'  => $request->input('slug'),
                'image'  => $imageName,
                'active'  => $request->input('active'),
                'content' => $request->input('content')

                ]);

            }

            else
                
            {

                return redirect('/create')
                          ->with('status_upload', 'Can not upload file'); 

            }

        } 
        else         
        {

           Articles::create([

                'title' => $request->input('title'),
                'slug'  => $request->input('slug'),
                'active'  => $request->input('active'),
                'content' => $request->input('content')

                ]); 

        }

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $articles = Articles::where( 'slug' , $slug)
                              ->get();
        return view('backend.detail', ['articles' => $articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::findOrFail($id);
        return view('backend.create', ['articles' => $articles]);
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

        if($request->hasFile('image'))
        {
            $article = Articles::find($id);
            $file = $request->file('image');
            $fileExtension = $file->getClientOriginalExtension();
            $timeNow = date('_Y_m_d_H_i');
            $imageName = $request->input('slug').$timeNow.'.'.$fileExtension;

            // Delete old data of article.
            unlink(config('app.upload').$article['image']); 

            if($request->file('image')->move(config('app.upload'), $imageName))
            {

                

                $article->title = $request->input('title');
                $article->slug = $request->input('slug');
                $article->image = $imageName;
                $article->content = $request->input('content');
                $article->active = $request->input('active');
                $article->save();

                return redirect('/dashboard');

            } 
            else
            {

                return redirect('/create')
                          ->with('status_upload', 'Can not upload file'); 

            }

        }
        else
        {

                $article = Articles::find($id);
                $article->title = $request->input('title');
                $article->slug = $request->input('slug');
                $article->content = $request->input('content');
                $article->active = $request->input('active');
                $article->save();

                return redirect('/');

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $article = Articles::find($id);

        if($article['image'])
        {
            unlink(config('app.upload').$article['image']);
        } 

        $article->delete();

        return redirect('/admin/dashboard');

    }







}
