<?php
namespace App\Http\Services\Category;

use App\Category;
use App\Http\Repositories\Category\CategoryRepoInterface;
use App\Http\Services\Category\CategoryServiceInterface;
use Illuminate\Support\Str;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryService;

    public function __construct(CategoryRepoInterface $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        return $this->categoryService->getAll();
    }

    public function store($request)
    {
        $obj = new Category();
        $obj->name = $request->name;
        $obj->slug = Str::slug($request->name, '-');
        $obj->desciption = $request->description;
        $this->categoryService->store($obj);
    }

    public function update($obj, $request)
    {
        $obj->name = $request->name;
        $obj->slug = Str::slug($request->name, '-');
        $obj->desciption = $request->description;
        $this->categoryService->store($obj);
    }

    public function destroy($id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->destroy($category);
    }

    public function findById($id)
    {
        return $this->categoryService->findById($id);
    }

}