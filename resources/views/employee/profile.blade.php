@extends('layouts.topheader')

@section('content')
<style>
    .emp-profile {
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}


#data {
    background: transparent;
    border: none;
    border-bottom: 1px solid #ffff;
}

#area {
    background: transparent;
    border: none;
    border-bottom: 1px solid #ffff;
}
</style>

<div class="container">
 

<div class="row">

    <div class="section-title mt-4 mb-4">
        <h4>
            Employee Profile
        </h4>
    </div>

    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img container-fluid">
                            <img src="{{ asset('img/user.png') }}" alt="" style="height: 200px;width:200px;">
                            <div class="file btn btn-sm btn-primary" >
                               
                                <input type="file" name="file">
                            </div>
                        </div>

                         <br>

                     <div class="profile-work">
                            
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br>
                            <a href="">Web Developer</a><br>
                            <a href="">WordPress</a><br>
                            <a href="">WooCommerce</a><br>
                            <a href="">PHP, .Net</a><br>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                Employee Name 
                            </h5><br>
                            <h6>
                                Web Developer and Designer
                            </h6>
                            <br>

                             <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">About</a></li>
  <li><a data-toggle="tab" href="#menu1"> Add Skill </a></li>
 
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Profile Detail </h3>
    <form method="post" action="">
               <div class="row">
                <div class="col-md-6">
                    <label> Empno </label>
                </div>
                <div class="col-md-6">
                      <input type="text" name="empno" class="form-control" id="data" value="Empno" disabled="true">
                </div>
              </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Name</label>
                </div>
                <div class="col-md-6">
                      <input type="text" name="name" class="form-control" id="data" value="Emp Name" disabled="true">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Email</label>
                </div>
                <div class="col-md-6">
                      <input type="text" name="mail" class="form-control" id="data" value="emp@gmail.com" disabled="true">
                </div>
            </div>
           
           <div class="row">
                <div class="col-md-6">
                    <label>Phone</label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="phno" class="form-control" id="data" value="09785224820">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Address </label>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" id="area"> Myanamar </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Joined Date</label>
                </div>
                <div class="col-md-6">
                   <input type="text" name="phno" class="form-control" id="data" value="2020-05-09" disabled="true">
                </div>
            </div>

           

  </form>
  </div>
  <div id="menu1" class="tab-pane fade" data-toggle="tab">
    <h3> Add Your Skill </h3> <br>
    
    <form method="post" action="submit.php">
            
    <div class="form-group fieldGroup">
        <div class="input-group">
            <input type="text" name="skill[]" class="form-control" placeholder="Enter Skill" style="width:400px;" />
            <div class="input-group-addon"> 
                <a href="javascript" class="btn btn-success btn-sm addMore">
                	<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
            </div> 
        </div>
    </div>
    
    <input type="submit" name="addskill" class="btn btn-primary" value="Add"/>
    
</form>
  </div>
  
</div>

                   </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-info" name="btnAddMore" value="Edit Profile">
                    </div>


                </div>
              

               
                
            </form>           
        </div>
   
 </div>   

    
</div>
@endsection
