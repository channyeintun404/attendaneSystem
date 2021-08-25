<?php

namespace App\Dao;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeeDao
{

    protected $employee;

    public function __construct(Employee $employee){
        $this->employee =$employee;
    }

          /**
     *get all employee
     *
     * 
     */
    public function getAll()
    {
        $employees = Employee::all();
        return $employees;
    }

          /**
     *save absent employee attendance
     *
     * @param  $data
     * @return $attendaces
     */
    public function saveEmployee($data)
    {
        $employee = new $this->employee;
        $employee -> emp_name = $data->input('emp_name');
        $employee -> emp_no = $data->input('emp_no');        
        $employee -> emp_phno = $data->input('emp_phno');        
        $employee -> emp_address = $data->input('emp_address');
        $employee -> emp_position = $data->input('emp_position');
        $employee -> password = $data->input('password');
        $employee -> emp_email = $data->input('emp_email');        
        $employee -> emp_joindate = $data->input('emp_joindate');        
        $employee -> dateofbirth = $data->input('dateofbirth');
        $employee -> emp_nrc = $data->input('emp_nrc');
        $employee -> gender = $data->input('gender');        
        $employee -> delete_flag = false;

        
        //handle the is_uploaded_file
        if($data->hasFile('emp_img')){
            //get filename with get_loaded_extensions
            $filenameWithExt = $data->file('emp_img')->getClientOriginalName();
            //get just fileName
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $data->file('emp_img')->getClientOriginalName();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $data->file('emp_img')->storeAs('public/image',$fileNameToStore);  
          }

        if ($data->hasFile('emp_img')) {
            $employee-> emp_img = $fileNameToStore;
          }

        $employee->save();
        return $employee->fresh();
    }

      //get employee by Id
    public function getById($id)
    {
        $employee = Employee::find($id);
        return $employee;
    }  

    //update employee  by Id
    public function updateEmployee($data)
    {
         //handle the is_uploaded_file
         if($data->hasFile('emp_img')){
            //get filename with get_loaded_extensions
            $filenameWithExt = $data->file('emp_img')->getClientOriginalName();
            //get just fileName
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $data->file('emp_img')->getClientOriginalName();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $data->file('emp_img')->storeAs('public/image',$fileNameToStore);
         }
        $id=$data->input('id');
        $employee = Employee::find($id);
        $employee -> emp_name = $data->input('emp_name');
        $employee -> emp_no = $data->input('emp_no');        
        $employee -> emp_phno = $data->input('emp_phno');        
        $employee -> emp_address = $data->input('emp_address');
        $employee -> emp_position = $data->input('emp_position');
        $employee -> password = $data->input('password');
        $employee -> emp_email = $data->input('emp_email');        
        $employee -> emp_joindate = $data->input('emp_joindate');        
        $employee -> dateofbirth = $data->input('dateofbirth');
        $employee -> gender = $data->input('gender');
        $employee -> emp_nrc = $data->input('emp_nrc');        
        if ($data->hasFile('emp_img')) {
            $employee-> emp_img = $fileNameToStore;
          }
        $employee->save();
        return $employee;
    }   

    //delete employee by changing delete_flag
    public function delete($data)
    {
        $id=$data->input('id');
        $employee = Employee::find($id);
        $employee-> delete_flag = true;        
        $employee-> deleted_at = date('Y-m-d H:i:s');;
        $employee->save();

    }  

    
}