<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubejctModel;
use App\Models\Subject;
use App\Models\ClassModel;
use Auth;

class ClassSubjectConroller extends Controller
{
    public function list()
    {   
        $data['getrecords'] = ClassSubejctModel::getrecords();
        // dd($data['getrecords']);
        $data['head_title']= 'Class list';
        return view('admin.assign_subject.list',$data);
    }       

    public function add()
    {
        $data['ClassGetrecords'] = ClassModel::ClassGetrecords();
        $data['SubjectGetrecords'] =Subject::SubjectGetrecords();
        $data['head_title'] = 'Add Class';
        return view('admin.assign_subject.add',$data);
    }   
    public function insert(Request $request)
    {
        if(!empty($request->subject_id)){   
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyfirst=ClassSubejctModel::getAlreadyfirst($request->class_id,$subject_id);
                if (!empty($getAlreadyfirst)) {
                    $getAlreadyfirst->status = $request->status;
                    $getAlreadyfirst->save();
                }else {
                    $save = new ClassSubejctModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->created_by = Auth::user()->id;
                    $save->status = $request->status;
                    $save->save();
                }
            }
            return redirect()->route('assign_subject.list')->with('success', 'New Assign Subject Add Successfully');

            }else{

            return redirect()->route('assign_subject.list')->with('errors', 'Due to Some Errors, Please try agen.');
        }
    }
    public function edit($id)
    {   
        $data['records']=ClassSubejctModel::singlerecord($id);
        // dd($data['records']);
        $data['head_title']='Edit Class list';
         return view('admin.assign_subject.edit',$data);
    }
}
