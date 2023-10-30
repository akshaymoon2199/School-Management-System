<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassSubejctModel extends Model
{
    use HasFactory;
    protected $table = 'class_subjects';
    static function getrecords()
    {
        $request = self::Select('class_subjects.*', 'class.name as class_name', 'subjects.name as subject_name', 'users.name as create_by_name')
            ->join('class', 'class.id', '=', 'class_subjects.class_id')
            ->join('subjects', 'subjects.id', '=', 'class_subjects.subject_id')
            ->join('users', 'users.id', '=', 'class_subjects.created_by');
            if(!empty($request::get('class_name'))){
                $request->where('class.name','like','%'.$request::get('class_name').'%');
            }
            if(!empty($request::get('subject_name'))){
                $request->where('subjects.name','like','%'.$request::get('subject_name').'%');
            }
            if(!empty($request::get('date'))){
                $request->where('class_subjects.created_at','like','%'.$request::get('date').'%');
            }
            
        $request = $request->orderby('class_subjects.id','desc')
            ->paginate(10);

        return $request;
    }
    static function singlerecord($id)
    {
        $request=ClassSubejctModel::find($id);
        return $request;
    }


    static function getAlreadyfirst($class_id,$subject_id)
    {
        $request = self::where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->first();
        return $request;        

    }
   
}
