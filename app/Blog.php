<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['title',
                          'description','featured_image_url'
                          ,'category_id','user_id'];

    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }


}
