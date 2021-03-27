<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model implements HasMedia
{ 
    use InteractsWithMedia;
    use HasFactory;
    
 /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


     /**
     * Register media collections
     */
    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->useFallbackUrl(config('app.placeholder').'800.png')
            ->useFallbackPath(config('app.placeholder').'800.png');
    }

}
