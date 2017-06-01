<?php

namespace laravelAPI;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name','address','phone','responsable','obs'];
}
