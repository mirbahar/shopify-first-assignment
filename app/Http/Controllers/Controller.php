<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    const SUCCESS_MESSAGE = "New record has been created successfully";
    const SUCCESS_UPDATE_MESSAGE = "Record has been updated successfully";
    const SUCCESS_DELETE_MESSAGE = "Record has been deleted successfully";

    public function __construct(
        protected RepositoryInterface $repository
    ){}

    public function list()
    {
        $cols = $this->repository->getDefaultCols();

        if(app('request')->get('page') == 'all') {
            $response = $this->repository->all($cols);
        } else {
            $response = $this->repository->paginate(null, $cols);
        }

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $result = $this
            ->repository
            ->create($request->all());

        return  $this->response($result['data']['id'], self::SUCCESS_MESSAGE);
    }

    public function details(Request $request, int $id)
    {
        $request->merge([
            'cols' => '*'
        ]);

        $response = $this->repository->find($id)['data'];
        return response()->json($response);
    }

    public function update(Request $request, int $id)
    {
        $request->merge([
            'cols' => '*'
        ]);

        $this
            ->repository
            ->update($request->all(), $id)
        ;

        return $this->response($id, self::SUCCESS_UPDATE_MESSAGE);
    }

    public function delete(Request $request, int $id)
    {
        $request->merge([
            'cols' => '*'
        ]);

        $response = $this->repository->delete($id);

        return $this->response($id, self::SUCCESS_DELETE_MESSAGE);
    }

    public function response($id, $message)
    {
        return response()->json([
            'id' => $id,
            'respond_at' => time(),
            'message' => $message
        ]);
    }
}
