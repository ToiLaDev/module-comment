<?php

namespace ToiLaDev\Comment\Controllers\Admin;


use ToiLaDev\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use ToiLaDev\Blog\DataTables\PostsDataTable;
use ToiLaDev\Blog\Requests\PostRequest;
use ToiLaDev\Blog\Services\BlogService;

class CommentController extends Controller
{
    public $permissions = [
        'comment.view' => ['index'],
        'comment.create' => ['create', 'store'],
        'comment.edit' => ['edit', 'update'],
        'comment.delete' => ['destroy']
    ];

    public $breadcrumbs = [
        ['link' => 'javascript:void(0)', 'name' => 'Content Manager']
    ];

    public string $mainRouteName = 'admin.blog.posts.index';

    public $blogService;

    public function __construct(BlogService $blogService)
    {
        parent::__construct();
        $this->blogService = $blogService;
    }

    public function index(PostsDataTable $dataTable)
    {
        $this->breadcrumb('Blogs');

        return $dataTable->render('Blog::admin.post.list');
    }

    public function create(Request $request)
    {
        $this->breadcrumb('Blogs')->withButtonMain();
        $categories = $this->blogService->allCategories();

        return view('Blog::admin.post.create', [
            'options' => toSelect($categories->toFlatTree())
        ]);
    }

    public function edit(int $id, Request $request)
    {
        $this->breadcrumb('Blogs')->withButtonMain();

        $categories = $this->blogService->allCategories();
        $post = $this->blogService->find($id);
        return view('Blog::admin.post.edit', [
            'post' => $post,
            'options' => toSelect($categories->toFlatTree()),
            'categories' => $this->blogService->idCategories($post)
        ]);
    }

    public function store(PostRequest $request) {
        $post = $this->blogService->createFromRequest($request);

        return $this->storeResponse($post);
    }

    public function update(int $id, PostRequest $request) {
        $post = $this->blogService->updateFromRequest($id, $request);

        return $this->updateResponse($post);
    }

    public function destroy(int $id, Request $request) {

        $this->blogService->delete($id);

        return $this->deleteResponse();
    }

}
