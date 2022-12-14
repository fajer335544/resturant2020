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
                   {{ __('messages.User Edit')}}
                </div>


             @if (Session::has('success'))  
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
             @endif 

            <form method="post" action="{{Route('update.user',$user->id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__('messages.User Name')}}</label>
                      <input type="text" class="form-control" name="name" value={{$user['name']}}>
                      @error('name')
                      <small  class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{__('messages.User Phone')}}</label>
                        <input type="int" class="form-control" name="phone" value={{$user['phone']}}>
                        @error('phone')
                        <small  class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">{{__('messages.premission')}}</label>
                    <select  class="form-control" name ='User_type'>
                       <option>Admin</option> 
                       <option>chef</option> 
                       <option>user</option> 
                    <select
                     
                    </div>
                  
                    
                    <button type="submit" class="btn btn-primary">{{__('messages.Send')}}</button>
            </form>
                  
                
            </div>
        </div>
    </body>
</html>
