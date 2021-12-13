<?php

namespace App\Dao;

use App\Interfaces\Dao\studentDaoInterface;
use App\Models\Student;
use Hash;

/**
 * SystemName : Student Registration System
 * ModuleName : Student Dao
 */
class studentDao implements studentDaoInterface
{
    /**
     * Get student ID
     * 
     */
    public function getStudentById($id)
    {
        return Student::findOrFail($id);
    }  
    /**
     * Get student data from table
     *
     * @param $request
     * @return array
     */
    public function getStudentList($request)
    {
        if ($request->id && $request->name) {
            $result = Student::where('id', 'LIKE', '%'.$request->id.'%')
                    ->where('name', 'LIKE', '%'.$request->name.'%')
                    ->sortable()->paginate(5);
        } elseif ($request->id && !$request->name) {
            $result = Student::where('id', 'LIKE', '%'.$request->id.'%')
                    ->sortable()->paginate(5);
        } elseif (!$request->id && $request->name) {
            $result = Student::where('name', 'LIKE', '%'.$request->name.'%')
                    ->sortable()->paginate(5);
        } else {
            $result = Student::sortable()->paginate(5);
        }
        return $result;
    }
    /**
     * Add a new student to Students table
     * 
     */
    public function addStudent($request)
    {
        $student = [
            "name" => $request->name,
            "major" => $request->major,
            "email" => $request->email,
            "phone_number" => $request->phone_number
        ];
        $result = Student::create($student);
        return $result;
    }
    /**
     * Update a student's profile
     * 
     */
    public function updateStudent($request,$id)
    {
        if($request->filled('name')){
            $name=$request->input('name');
        }
        else{
            $name=Student::where('id', $id)->value('name');
        }
        if($request->filled('major')){
            $major=$request->input('major');
        }
        else{
            $major=Student::where('id', $id)->value('major');
        }
        if($request->filled('email')){
            $email=$request->input('email');
        }
        else{
            $email=Student::where('id', $id)->value('email');
        }
        if($request->filled('phone_number')){
            $phone=$request->input('phone_number');
        }
        else{
            $phone=Student::where('id', $id)->value('phone_number');
        }
        $result=Student::where('id', $id)->update(['name'=>$name,'major'=>$major,'email'=>$email,'phone_number'=>$phone]);
        return $result;
    }
    /**
     *  Delete a student from Students table
     * 
     */
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        return $student->delete();
    }
    
}