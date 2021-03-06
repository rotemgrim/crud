<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Post;
use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $this->prepare($request->all());
        Post::create($requestData);
        Session::flash('flash_message', 'Post added!');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $requestData = $this->prepare($request->all());
        $post = Post::findOrFail($id);
        $post->update($requestData);
        Session::flash('flash_message', 'Post updated!');
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);
        Session::flash('flash_message', 'Post deleted!');
        return redirect('admin/posts');
    }

    /**
     * Prepare the fields for insert / update
     *
     * @param $requestData
     * @return mixed
     */
    private function prepare($requestData)
    {
        // In a real app userId will come from logged-in user.
        if (empty($requestData['userId'])) {
            $requestData['userId'] = 1;
        }

        // if review/rating is missing just null it up.
        if (empty($requestData['review'])) {
            $requestData['review'] = null;
        }
        if (empty($requestData['rating'])) {
            $requestData['rating'] = null;
        }
        return $requestData;
    }
}
