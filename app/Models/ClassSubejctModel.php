<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubejctModel extends Model
{
    use HasFactory;
    protected $table = 'class_subjects';
    static function getrecords()
    {
       $request= self::get();
        return $request;
    }
    static function singlerecord($id)
    {
        $request=ClassMClassSubejctModelodel::find($id);
        return $request;
    }
}
