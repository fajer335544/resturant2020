<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
               
              </ul>
            </div>
          </nav> 
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a @if(Auth::user()->User_type == 'admin')
                             href="{{ url('/home/admin') }}"
    
                        @elseif(Auth::user()->User_type == 'chef')
                            href="{{ url('/home/chef') }}"
    
                        @else 
                            href="{{ url('/home') }}"  @endif
                        
                    >{{__('messages.Home')}}</a>
                    <a href="{{route('Get.All.Employee')}}" >{{__('messages.back')}}</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
                </div>
            @endif

        

            <div class="content">
                <div class="title m-b-md">
                 {{ __ ('messages.Edit Employee')}}
                </div>


             @if (Session::has('seccessUpdate'))  
                <div class="alert alert-success" role="alert">
                    {{Session::get('seccessUpdate')}}
                </div>
             @endif 

            <form method="post" action="{{Route('employee.Update',$employee->id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__('messages.Employee Name')}}</label>
                      <input type="text" class="form-control" value="{{$employee->name}}" name="name"  placeholder="{{__('messages.Enter Your Name')}}">
                      @error('name')
                      <small  class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{__('messages.Employee Namber')}}</label>
                        <input type="int" class="form-control" name="number" placeholder="{{__('messages.Enter Your Number')}} ">
                        @error('number')
                        <small  class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">{{__('messages.Employee Salary')}}</label>
                      <input type="int" class="form-control" name="salary" placeholder="{{__('messages.Enter Your Salary')}}">
                      @error('salary')
                      <small  class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{__('messages.Employee Experience')}}</label>
                        <input type="text" class="form-control" name="experience" placeholder="{{__('messages.Enter Your experience')}}">
                        @error('experience')
                        <small  class="form-text text-danger">{{$message}}</small>
                        @enderror
                        
                      </div>
                    
                    <button type="submit" class="btn btn-primary">{{__('messages.Update')}}</button>
            </form>

            
                  
                
            </div>
        </div>
    </body>
</html>