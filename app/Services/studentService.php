<?php

namespace App\Services;

use App\Interfaces\Services\studentServiceInterface;
use App\Interfaces\Dao\studentDaoInterface;
use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Hash;

class studentService implements studentServiceInterface
{
    private $studentDao;

    /**
     * Class Constructor
     * 
     * @param studentDaoInterface $employeeDao
     */
    public function __construct(studentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * Get employee data from table
     *
     * @param $request
     * @return array
     */
    public function getStudentById($id)
    {
        return $this->studentDao->getStudentById($id);
    }
    public function getStudentList($request) 
    {
        return $this->studentDao->getStudentList($request);
    }
    public function deleteStudent($id)
    {
        return $this->studentDao->deleteStudent($id);
    }
    public function addStudent($request)
    {
        $subject = "Account for Student Registration System";
        $view = "email.account";
        $result = $this->studentDao->addStudent($request);
        return $result;
    }
    public function updateStudent($request, $id)
    {
        $student = $this->studentDao->getStudentById($id);
        $result = $this->studentDao->updateStudent($request, $id);
        return $result;
    }
}