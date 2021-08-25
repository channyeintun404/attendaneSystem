@extends('layouts.topheader')

@section('content')
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <script type="text/javascript" src="{{asset('js/clock.js')}}"></script>
    <body> 
    <div class="container" >
        <div class="row mb-sm-5 mt-sm-4"> 
            
        <div class="col-sm-9 text-white">
            <h3 class="float-left mt-sm-3  ml-sm-2" > Welcome {{Session()->get('employee')->emp_email}} </h3>   
        </div>
        <div class="col-sm-2"></div>
        </div>
            <div class="row">
                <div class="col-sm-4 " >
                    <div class="text-center clock">  
                        <canvas id="canvas" class="w-100 h-100" width="250" height="250">
                        </canvas>
                        
                    </div>
                </div>
                <div class="col-sm-8 mt-sm-4 mb-sm-6 "> 
                    
                @if(count($attendances)>0)
                    @foreach($attendances as $attendance)
                    <div class="container right">
                        <div class="row buttonRow">
                            <div class="col-md-3"> </div>
                            <div class="col-md-3 ">
                            @if($attendance->status == true)
                                <a class="btn btn-success  btn-lg button float-right disabled" style="font-size:20px; " href="/attendances/create">{{$attendance->checkin}}</a>
                            @endif
                            </div>
                            <div class="col-md-3">
                            @if($attendance->checkout == null)   
                                <a class="btn btn-secondary  btn-lg button float-right " style="font-size:20px;" href="/attendances/{{$attendance->id}}/edit">CheckOut</a>  
                            @else
                                <a class="btn btn-secondary  btn-lg button float-right disabled" style="font-size:20px;" href="#">{{$attendance->checkout}}</a>  
                            @endif
                            </div>

                        </div>
                        <div class="row succesRrow">
                        @if($attendance->checkout == null)                        
                            <div class="col-md-4  bg-success">You are Work In!! </div>
                        @else
                        <div class="col-md-4  bg-success">Now your are Checkout</div>
                        @endif
                            <div class="col-md-2  bg-success">
                            </div>
                            <div class="col-md-3  bg-success">   
                            </div>

                        </div>
                        
                        <div class="row succesRrow">
                        @if($attendance->checkout == null)                        
                        <div class="col-md-9  bg-success"> {{Session()->get('employee')->emp_name}} Workin at {{$attendance->checkin}}  </div>
                        @else
                        <div class="col-md-9  bg-success"> {{Session()->get('employee')->emp_name}} Workout at {{$attendance->checkout}}  </div>
                        @endif
                            
                           
                        </div>
                </div>
                     @endforeach
                <!--if employee not still workin -->
                @else
                <div class="container right">
                        <div class="row buttonRow">
                            <div class="col-md-3">                               
                            </div>
                            <div class="col-md-3 ">
                                 <a class="btn btn-success  btn-lg button float-right " style="font-size:20px; width: 110px; " href="/attendances/create">CheckIn </a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary  btn-lg button float-right disable" style="font-size:19px; width: 110px; " href="#">CheckOut</a>  
                                                         
                            </div>

                        </div>
                        <div class="row succesRrow">
                            <div class="col-md-4  bg-success"> You are not WorkIn                            
                            </div>
                            <div class="col-md-2  bg-success">
                            </div>
                            <div class="col-md-3  bg-success">   
                            </div>

                        </div>
                        
                        <div class="row succesRrow">
                            <div class="col-md-9  bg-success"> You need to click CheckIn                           
                            </div>
                           
                        </div>
                </div>
                @endif
            </div>
        </div>
        </div>

    </body>
    <script>
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        var radius = canvas.height / 2;
        ctx.translate(radius, radius);
        radius = radius * 0.90
        setInterval(drawClock, 1000);

        function drawClock() {
        drawFace(ctx, radius);
        drawNumbers(ctx, radius);
        drawTime(ctx, radius);
        }

        function drawFace(ctx, radius) {
        var grad;
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2*Math.PI);
        ctx.fillStyle = 'white';
        ctx.fill();
        grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
        grad.addColorStop(0, '#333');
        grad.addColorStop(0.5, 'white');
        grad.addColorStop(1, '#333');
        ctx.strokeStyle = grad;
        ctx.lineWidth = radius*0.1;
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
        ctx.fillStyle = '#333';
        ctx.fill();
        }

        function drawNumbers(ctx, radius) {
        var ang;
        var num;
        ctx.font = radius*0.15 + "px arial";
        ctx.textBaseline="middle";
        ctx.textAlign="center";
        for(num = 1; num < 13; num++){
            ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius*0.85);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius*0.85);
            ctx.rotate(-ang);
        }
        }

        function drawTime(ctx, radius){
            var now = new Date();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();
            //hour
            hour=hour%12;
            hour=(hour*Math.PI/6)+
            (minute*Math.PI/(6*60))+
            (second*Math.PI/(360*60));
            drawHand(ctx, hour, radius*0.5, radius*0.07);
            //minute
            minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
            drawHand(ctx, minute, radius*0.8, radius*0.07);
            // second
            second=(second*Math.PI/30);
            drawHand(ctx, second, radius*0.9, radius*0.02);
        }

        function drawHand(ctx, pos, length, width) {
            ctx.beginPath();
            ctx.lineWidth = width;
            ctx.lineCap = "round";
            ctx.moveTo(0,0);
            ctx.rotate(pos);
            ctx.lineTo(0, -length);
            ctx.stroke();
            ctx.rotate(-pos);
        }
    </script>
@endsection