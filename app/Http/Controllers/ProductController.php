<?php

namespace App\Http\Controllers;

use App\Repositories\CollectionRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        ProductRepositoryEloquent $repository,
        private readonly CollectionRepositoryEloquent $collectionRepositoryEloquent)
    {
        parent::__construct($repository);
    }

    public function createForm() {

        $collections = $this->collectionRepositoryEloquent->all(['id','name']);
        $collections = count($collections) > 0 ? $collections['data'] : [];
        return view('product.create', compact('collections'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        $redirectUrl =  getRedirectRoute('product.list');
        return redirect($redirectUrl);

    }
    public function edit($id) {

        $product = $this->repository->find($id);
        $collections = $this->collectionRepositoryEloquent->all(['id','name']);
        $collections = count($collections) > 0 ? $collections['data'] : [];
        return view('product.edit', compact('product', 'collections'));
    }

    public function update(Request $request, int $id)
    {
        parent::update($request, $id);
        $redirectUrl =  getRedirectRoute('product.list');
        return redirect($redirectUrl);
    }

    public function list()
    {
        $products = $this->repository->with('collection')->all();
        return view('product.index', compact('products'));
    }
    public function getProductByCollection($id)
    {
        $productObj = $this->repository->findByField('collection_id', $id);

        if(count($productObj) <= 0){
            $products['data'] = [];
            return view('product.index', compact('products'));
        }
        $products = $productObj['data'];
        return view('product.index', compact('products'));
    }
}
