<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopePerson;

class Person extends Model
{
    // protected static function boot(){
    //     parent::boot();
    //     static::addGlobalScope(new ScopePerson);
    // }

    protected $guarded = array("id");
    //更新、登録時刻カラムが存在しないことを指定
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function getData(){
        return $this->id.': '.$this->name.'('.$this->age.')';
    }

    public static $rules = array(
        "name" => "required",
        "mail" => "email",
        "age" => "integer|min:0|max:150"
    );

    public function board(){
        return $this->hasOne("App\Board");
    }

}
