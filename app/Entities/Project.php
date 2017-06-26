<?php

namespace laravelAPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use laravelAPI\Entities\User;
use laravelAPI\Entities\Client;
use laravelAPI\Entities\ProjectNote;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'owner_id','client_id','name','description','progress','status','due_date'
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function notes(){
        return $this->hasMany(ProjectNote::class);
    }

}
