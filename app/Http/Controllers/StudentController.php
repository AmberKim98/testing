<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Interfaces\Services\studentServiceInterface;
use Illuminate\Support\Facades\Auth;
use Config;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use KyslikColumnSortableSortable;

class StudentController extends Controller
{
    private $studentInterface;
    
    /**
     * Create controller instance
     * 
     */
    public function __construct(studentServiceInterface $studentInterface) 
    {
        $this->studentInterface = $studentInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::sortable()->paginate(5);

        return view('index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('add-new-student');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreStudentRequest  $request
     * @return object
     */
    public function addStudent(StoreStudentRequest $request)
    {
        $this->studentInterface->addStudent($request);
        return redirect()->route('student_list')
            ->with('success', 'New student added successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('show',compact('student'));
    }

    /** 
     * Get student data from table
     *
     * @param  Illuminate\Http\Request  $request
     * @return array
     */
    public function getStudentList(Request $request) 
    {
        $student = $this->studentInterface->getStudentList($request);
        Log::info($student);
        return view('student_list')
                ->with('students', $student)
                ->with('keyword', $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function edit(Student $student)
    // {
    //     return view('edit',compact('student'));
    // }
    public function edit(int $id, Request $request)
    {
        $student = $this->studentInterface->getStudentById($id);
        return view('edit', [ 'student' => $student, 'page' => $request->page]);
    }
    /**
     * Update existing student data to table
     * @param App\Http\Requests\StoreStudentRequest  $request
     * @param int $id
     * @return object
     */
    public function updateStudent(Request $request, int $id)
    {
        $student = $this->studentInterface->updateStudent($request, $id);
        return redirect()->route('student_list')
            ->with('success', 'Profile was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function deleteStudent(int $id)
    {
        $this->studentInterface->deleteStudent($id);
        Log::info('');
        return redirect()->back()
            ->with('success', 'A student profile was deleted successfully.');
    }
    /**
     * 
     * Sort the students list.
     */
    // public function indexSorting()
    // {
    //     $products = Student::sortable()->paginate(5);

    //     return view('student_list')->with('students', $products);
    // }
}
