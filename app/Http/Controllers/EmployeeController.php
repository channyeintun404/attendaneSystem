<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{

    protected $employeeService;

    public function __construct(EmployeeService $employeeService){

        $this->employeeService = $employeeService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeService->getAllEmployee();
        return view('admin.employeelist')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $this->validate($request,[
            // 'emp_name'=>'required',
            // 'emp_no'=>'required',
            // 'emp_address'=>'required',
            // 'emp_phno'=>'required',
            // 'emp_position'=>'required',
            // 'emp_email'=>'required',
            // 'emp_joindate'=>'required',
            // 'dateofbirth'=>'required',
            'emp_img'=> 'image|nullable|max:1999'
          ]);
        $this->employeeService->saveEmployee($request);
        return redirect('/employees')->with('success','New Employee have been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $employee = $this->employeeService->getById($id);
        return view('admin.employeeedit')->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'emp_img'=> 'image|nullable|max:1999'
          ]);
        $this->employeeService->updateEmployee($request);
        return redirect('/employees')->with('success','Employee have been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     ** @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory(Request $request)
    {
        $this->employeeService->deleteEmployee($request);
        return redirect('/employees')->with('success','Employee have been deleted!');
    }
}
