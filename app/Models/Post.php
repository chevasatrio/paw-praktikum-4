<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
 {
//     protected $fillable = [
//         'title',
//         'content',
//         'user_id',
//     ];

    //
    protected $guarded = [];
}
// function getPosts()
//     {
//         $posts = $this->getPosts();
//         foreach ($posts as $post) {
//             if ($post['id'] == $id) {
//                 return view('posts.show', compact('post'));
//             }
//         }   
//         abort(404);
//     }