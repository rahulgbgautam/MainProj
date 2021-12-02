<!-- @extends('layouts.adminAuth') -->
@section('content')
 <div class="main-wrapper">
        <div class="login-signup-box d-flex justify-content-center w-100">
            <div class="form-box">
                <form action="{{url('/admin/login')}}" method="post">
                	@csrf
                    <div class="form-head">
                        <h2>Login</h2>
						@if(session()->has('errorMessage'))
                            <span class="text-danger" role="alert">
                                <strong>{{session('errorMessage')}} </strong>
                            </span>
                        @endif  
                        @error('errorMessage')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @endif        
                    </div>                 
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" id="email"class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="{{old('password')}}">
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>    
                    <div class="text-right">
						<a href="{{url('admin/forgot-password')}}" class="text-dark"> Forgot Password </a>
					</div>
                    <div class="form-button text-center">
                        <button type="submit" class="btn btn-primary d-block w-100">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection





