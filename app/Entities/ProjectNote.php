<?php

namespace laravelAPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use laravelAPI\Entities\Project;

class ProjectNote extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'project_id','title','note'
    ];

    public function project(){

        return $this->belongsTo(Project::class);

    }
}
