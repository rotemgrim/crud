<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Post;
use Session;

class LoadPostsController extends Controller
{
    /**
     * Loads all "jsonplaceholder" posts into CRUD system.
     *
     * @return string
     */
    public function index()
    {
        $posts = json_decode(file_get_contents('http://jsonplaceholder.typicode.com/posts/'), true);
        foreach ($posts as $post) {
            Post::create($post);
        }
        return 'Done!';
    }
}
