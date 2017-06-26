<?php

namespace laravelAPI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use laravelAPI\Repositories\ProjectRepository;
use laravelAPI\Entities\Project;
use laravelAPI\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace laravelAPI\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
