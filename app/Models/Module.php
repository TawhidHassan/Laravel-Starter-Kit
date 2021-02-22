<?php

namespace App\Models;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded=['id'];
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
