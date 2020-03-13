<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use post;
class Category extends Model
{
 protected $fillable =['name'];
 public function posts(){
    return $this->hasmany(post::class);
    }
}
