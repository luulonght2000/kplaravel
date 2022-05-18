<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $title = 'Báo mới';
    //     $title_page = 'List Posts';

    //     $posts = PostModel::withCount(['comment'])->orderBy('id', 'DESC')->with('user')->paginate(10);

    //     return view('fontend/posts.index', ['title' => $title, 'title_page' => $title_page, 'posts' => $posts]);
    // }

    public function index()
    {
        $title = 'Báo mới';
        $title_page = 'List Posts';

        $posts = PostModel::withCount(['comment'])->orderBy('id', 'DESC')->with('user')->paginate(10);

        if ($key = request()->key) {
            $posts = PostModel::withCount(['comment'])->orderBy('id', 'DESC')->with('user')->where('title', 'like', '%' . $key . '%')->paginate(10);
        }

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
        $users = User::all();
        $posts = PostModel::all();

        $title_page = "Create Post";
        return view('fontend/posts.new', ['title_page' => $title_page, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validator = $request->validated();
        $post = new PostModel;

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return redirect()->route('post.index')->with('message', 'Thêm thành công!');
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
        $post = PostModel::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Xóa thành công!');;
    }
}
