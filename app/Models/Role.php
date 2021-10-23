<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
   /**
    * The roles that belong to the Role
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public static function findByTitle($title){
        return self::query()->whereTitle($title)->firstOrFail();
    }

}
