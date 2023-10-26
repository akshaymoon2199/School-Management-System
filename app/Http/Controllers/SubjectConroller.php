<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\Subject;

class SubjectConroller extends Controller
{
    public function list()
    {
        $data['head-title'] = 'Subject list';
        return view("admin.subject.list",$data);
    }
    public function add(Request $request)
    {
        $data['head-title'] = 'Add subject';
        return view("admin/subject/add",$data);
    }
}
