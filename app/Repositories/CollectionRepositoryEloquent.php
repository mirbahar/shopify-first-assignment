<?php

namespace App\Repositories;

use App\Validators\CollectionValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Collection;
use Prettus\Repository\Presenter\ModelFractalPresenter;

/**
 * Class CollectionRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CollectionRepositoryEloquent extends BaseRepository implements CollectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Collection::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator(): mixed
    {
        return CollectionValidator::class;
    }
    public function presenter(): string
    {
        return ModelFractalPresenter::class;

    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
