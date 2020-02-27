<?php
namespace App\Http\Repositories\Category;

use App\Category;
use App\Http\Repositories\Category\CategoryRepoInterface;
use Illuminate\Support\Facades\Auth;

class CategoryRepo implements CategoryRepoInterface
{
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function update($obj)
    { 
        return Auth::attempt($obj);
    }

    public function destroy($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }
}