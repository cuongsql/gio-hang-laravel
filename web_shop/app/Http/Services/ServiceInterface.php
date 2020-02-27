<?php
namespace App\Http\Services;

interface ServiceInterface
{
    public function getAll();

    public function store($request);

    public function update($obj, $request);

    public function destroy($id);

    public function findById($id);
}