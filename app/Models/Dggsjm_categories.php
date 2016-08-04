<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dggsjm_categories extends Model
{
    protected $table = 'dggsjm_categories';

    public $timestams = false;

    public function posts(){
    	return $this->belongsToMany('App\Models\Dggsjm_posts', 'dggsjm_post_dggsjm_categories', 'category_id', 'post_id');
    }

}
