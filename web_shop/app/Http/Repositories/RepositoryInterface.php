<?php
namespace App\Http\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function store($obj);

    public function destroy($obj);

    public function findById($id);
}