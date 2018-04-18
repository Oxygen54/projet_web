<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability)
    {

        if ($user->isAdmin()) {

            return true;
        }
    }


    public function view(User $user, Post $post)
    {
        return true;
    }


    public function create(User $user)
    {
        return $user->isAdmin();
    }


    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
