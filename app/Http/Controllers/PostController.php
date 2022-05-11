<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Báo mới';
        $title_page = 'List Post';

        $posts = PostModel::withCount(['comment'])->with('user')->paginate(10);

        return view('fontend/posts.index', ['title' => $title, 'title_page' => $title_page, 'posts' => $posts]);
    }

    public function postDetail($id)
    {
        $title = 'Báo mới';
        $post = PostModel::findOrFail($id);
        $comments = $post->comment()->get();

        return view('fontend/posts.postdetail', ['title' => $title, 'post' => $post, 'comments' => $comments]);

        // $post = PostModel::with(['comment' => function ($query) {
        //     $query->where('description');
        // }])->get();

        // return view('fontend/posts.postdetail', ['title' => $title, 'posts' => $posts]);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
