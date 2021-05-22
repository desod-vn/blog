<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->role === 'admin')
        {
            return true;
        }
        
        return false;
    }



    public function viewAny(User $user)
    {
        return true;
    }



    public function view(User $user, Post $category)
    {
        return true;
    }



    public function create(User $user)
    {
        return $user->role === 'author';
    }



    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }



    public function delete(User $user, Post $post)
    {
        return false;
    }



    public function restore(User $user, Post $post)
    {
        return false;
    }



    public function forceDelete(User $user, Post $post)
    {
        return false;
    }
}
