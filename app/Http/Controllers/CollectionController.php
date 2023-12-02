<?php

namespace App\Http\Controllers;

use App\Repositories\CollectionRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CollectionController extends Controller
{
    public function __construct(CollectionRepositoryEloquent $repository)
    {
        parent::__construct($repository);
    }
    public function createForm(){
        return view('collection.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        $redirectUrl =  getRedirectRoute('collection.list');
        return redirect($redirectUrl);

    }
    public function edit($id){
        $collectionObj = $this->repository->find($id);
        $collection = $collectionObj['data'];
        return view('collection.edit', compact('collection'));
    }

    public function update(Request $request, int $id)
    {
        parent::update($request, $id);
        $redirectUrl =  getRedirectRoute('collection.list');
        return redirect($redirectUrl);
    }

    public function list()
    {
        $collections = $this->repository->all();
        return view('collection.index', compact('collections'));
    }
}
