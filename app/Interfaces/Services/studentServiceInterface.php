<?php

namespace App\Interfaces\Services;

/**
 * SystemName : Student Registration System
 * ModuleName : Interface for Student Registration Service
 */
interface studentServiceInterface
{
    /**
     * Get student data from table
     *
     * @param $request
     * @return array
     */
    
    public function getStudentById($id);
    public function getStudentList($request);
    public function deleteStudent($id);
    public function addStudent($request);
    public function updateStudent($request,$id);
}