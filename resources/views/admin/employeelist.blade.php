@extends('layouts.topheader')

@section('content')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/emplist.css">
<div class="container">
 

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-9 section-title mt-4 mb-4">
                <h4>
                    Employee List 
                </h4>        
            </div>
        
            <div class="col-md-3 ">
                <button type="button" class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#emp-entry">
                    Add New Employee
                  </button>
            </div>
        </div>
    </div>
   
    

    <!-- The Employee Entry Modal -->
  <div class="modal" id="emp-entry">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header float-right">
              <h5 class="modal-title " id="exampleModalLabel"> Add New Employee </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_no" class="col-form-label"> Employee No:  </label>
                                <input type="text" class="form-control" id="emp_no" name="emp_no" required>
                              </div>
                              <div class="form-group">
                                <label for="emp_name" class="col-form-label">  Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                              </div>
                              <div class="form-group">
                                <label for="emp_img" class="col-form-label">  Profile CV</label>
                                <input type="file" class="form-control" id="emp_img" name="emp_img">
                              </div>
                              <div class="form-group">
                                <label for="gender" class="col-form-label"> Gender</label>
                                <div class="input-group">
                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="gender">                                
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="emp_position" class="col-form-label"> Position</label>
                                  <input type="text" class="form-control" id="emp_position" name="emp_position" required>
                                </div>
                                <div class="form-group">
                                  <label for="emp_joindate" class="col-form-label"> Joined date</label>
                                  <input type="date" class="form-control" id="emp_joindate" name="emp_joindate" placeholder="join date" required>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_nrc" class="col-form-label"> NRC No:</label>
                                <input type="text" class="form-control" id="emp_nrc" name="emp_nrc" required>
                              </div>
                            <div class="form-group">
                                <label for="emp_email" class="col-form-label"> Email:  </label>
                                <input type="email" class="form-control" id="email" name="emp_email" required>
                              </div>
                              <div class="form-group">
                                <label for="emp_phno" class="col-form-label"> Phone no:</label>
                                <input type="text" class="form-control" id="emp_phno" name="emp_phno" required>
                              </div>
                              <div class="form-group">
                                <label for="emp_address" class="col-form-label"> Address </label>
                                <textarea class="form-control" id="emp_address" name="emp_address" required> </textarea>
                              </div>
                              
                                <div class="form-group">
                                  <label for="password" class="col-form-label"> Employee Password </label>
                                  <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="form-group">
                                  <label for="dateofbirth" class="col-form-label"> Date Of Birth</label>
                                  <input type="date" class="form-control" id="dateofbirth" data-date-format="YYYY MMMM DD" name="dateofbirth" required>
                                </div>

                                <div class="form-group">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal" style="width: 80px"> Cancel</button>
                                <button type="submit" class="btn btn-primary" style="width: 80px"> Add </button>
                              </div>
                        </div>
                    </div>
                </div>
            </form>
            
          </div>
    </div>
  </div>

  <div class="container">
    <div class="table table-responive">
      <table id="employeelist" class="table table-sm" style="font-size:13px" >
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Emp No</th>
            <th scope="col">Name</th>
            <th scope="col">NRC</th>
            <th scope="col">DOB</th>
            <th scope="col">Gender</th>
            <th scope="col">Ph No</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Position</th>
            <th scope="col">Joined date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody >
          @foreach($employees as $employee)
            @if(!$employee->delete_flag)
              <tr>
                <td><i class="fa fa-user-circle-o text-primary" aria-hidden="true" style="font-size:20px;"></i></td>
                <td >{{$employee->emp_no}}</td>            
                <td >{{$employee ->emp_name}}</td>
                <td >{{$employee->emp_nrc}}</td>                
                <td >{{ dateCovert($employee->dateofbirth) }}</td>
                <td >{{$employee->gender}}</td>    
                <td >{{$employee->emp_phno}}</td>
                <td >{{$employee->emp_email}}</td>
                <td >{{$employee->emp_address}}</td>
                <td>{{$employee->emp_position}}</td>                
                <td >{{ dateCovert($employee->emp_joindate) }}</td>
                <td>
                  <form method="POST" action="{{route('delete')}}" >
                    @csrf
                    <input type="text" name="id" value="{{$employee -> id}}" hidden>

                    <div  class="row">
                        <div class="col-sm-2 mr-3"><a href="/employees/{{$employee->id}}/edit" class="btn btn-sm btn-primary " ><i class="fa fa-pencil fa-fw"></i></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this employee?')"> <i class="fa fa-trash-o fa-fw"></i> </button></div>                            
                    </div>               
                    
                  </form>
                </td>
              </tr>
            @endif
          @endforeach    
        </tbody>
      </table> 
    </div>
  </div>
 </div>     
</div>
@endsection
<?php

//change date m/d/y
function dateCovert($date)
{
$originalDate = $date;
$newDate = date("m/d/Y", strtotime($date));

return $newDate;
}
?>
