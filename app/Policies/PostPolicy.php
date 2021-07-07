<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


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
        if($user->role)
            return true;
        
        return false;
    }



    public function update(User $user, Post $post)
    {
        if($user->id === $post->user_id)
            return true;

        return false;
    }



    public function delete(User $user, Post $post)
    {
        if($user->role === 'admin')
            return true;

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
