<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;   

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    // protected $fillable = ['name','status'];
     
    static function getrecords()
    {
        $request = ClassModel::select('class.*', 'users.name as create_by_name')
                            ->join('users', 'users.id', '=', 'class.create_by')
                            ->orderBy('class.id', 'desc')
                            ->paginate(1);
        return $request;
    }
    static function singlerecord($id)
    {
        $request=ClassModel::find($id);
        return $request;
    }
}
