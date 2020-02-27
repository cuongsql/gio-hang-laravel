<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Category\CategoryRepoInterface;
use App\Http\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService) {
        $this->categoryService = $categoryService;

    }

    public function index()
    {
        $categories = $this->categoryService->getAll();

        return view('admin.category.index', \compact('categories'));
    }

    public function formCreate()
    {
        return view('admin.category.create');
    }

    public function create(Request $request)
    {
        $this->categoryService->store($request);

        return redirect()->route('categoryList');
    }

    public function formEdit($id)
    {
        $category = $this->categoryService->findById($id);

        return view('admin.category.edit', \compact('category'));

    }

    public function update($id,Request $request)
    {
        $category_id = $this->categoryService->findById($id);
        $this->categoryService->update($category_id, $request);
        return redirect()->route('categoryList');
    }

    public function destroy($id)
    {
        $this->categoryService->destroy($id);
        return back();
    }
}
