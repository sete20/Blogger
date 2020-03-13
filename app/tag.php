<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\post;
class tag extends Model
{
    protected $fillable = ['name'];
    protected $table = 'tags';
    // protected $guarded = ['name'];
    public function posts(){
        //belongsto لمعرفة اين ينتمي البوست وما هو قسمه
        return $this->belongsToMany(post::class);
        }
        
}
