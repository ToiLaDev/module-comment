<?php

namespace ToiLaDev\Comment;

use ToiLaDev\Traits\ModuleServiceProviderTrait;
use ToiLaDev\Comment\Widgets\Comment;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    use ModuleServiceProviderTrait;

    private $widgets = [
        'comment'   => [Comment::class, 'show'],
    ];

    //private $theme = true;
}
