<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\category;
use App\tag;
use App\user;
class post extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','category_id','image' , 'content' , 'description' , 'title'];
    public function user(){
        //belongsto لمعرفة اين ينتمي البوست وما هو قسمه
        return $this->belongsTo(user::class);

        }
    
    public function Category(){
        //belongsto لمعرفة اين ينتمي البوست وما هو قسمه
        return $this->belongsTo(Category::class);

        }
        public function Tags(){
            //belongstoMany لمعرفة اين ينتمي البوست وما هو قسمه يمكن استخدام علاقة ماني تو ماني في اي جزء وع اي بوست 
            return $this->belongsToMany(tag::class);
            }

            public function hasTag($tagId){
               //in_array تستخدم لان الداتا في اللرافيل ترجع في شكل مصفوفة والبليك تستخدم لارجاع عمود واحد
                return in_array($tagId,$this->tags->pluck('id')->toArray());
               
            }
                   
}
