<?php

namespace App;
use App\user;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = [
        'about', 'twitter', 'facebook','picture','user_id'
    ];
    public function user(){
        return $this->belongsTo(user::class);
    }
}
 