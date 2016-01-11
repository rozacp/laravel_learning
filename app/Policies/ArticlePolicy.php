<?php

namespace App\Policies;

use App\Article;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy {

    use HandlesAuthorization;

    public function isRightUser(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

}
