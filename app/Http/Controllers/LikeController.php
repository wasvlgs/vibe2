<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function likePost(Post $post)
    {
        if (!$post->isLikedByUser()) {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ]);
        }

        return back();
    }

    public function unlikePost(Post $post)
    {
        Like::where('user_id', auth()->id())->where('post_id', $post->id)->delete();

        return back();
    }
}
