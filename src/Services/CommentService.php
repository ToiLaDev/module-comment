<?php

namespace ToiLaDev\Comment\Services;

use ToiLaDev\Services\RepositoryService;
use ToiLaDev\Comment\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService extends RepositoryService implements CommentServiceImpl
{

    public function __construct(CommentRepository $firstRepo)
    {
        $this->firstRepo = $firstRepo;
    }
}