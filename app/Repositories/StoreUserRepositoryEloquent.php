<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StoreUserRepository;
use App\Models\StoreUser;
use App\Validators\StoreUserValidator;

/**
 * Class StoreUserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StoreUserRepositoryEloquent extends BaseRepository implements StoreUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StoreUser::class;
    }



    /**
     * Boot up the repository, pushing criteria
     * @throws
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
