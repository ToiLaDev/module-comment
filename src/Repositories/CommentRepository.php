<?php

namespace ToiLaDev\Comment\Repositories;

use ToiLaDev\Repositories\Repository;
use ToiLaDev\Comment\Models\Comment;

class CommentRepository extends Repository implements CommentRepositoryImpl
{
    public function __construct(Comment $model) {
        $this->_model = $model;
    }
}