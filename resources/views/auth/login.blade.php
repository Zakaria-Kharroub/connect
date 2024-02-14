@extends('layouts.layout')
@section('content')
    <h1 class="mt-5">login</h1><br><br><br>

            
    <h1 class='text-center mt-5'>
        login
    </h1>

    <div class="container w-50">

        <form action="loginUser" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary bg-primary  w-100">login</button>

        </form>
        

    </div>

    
    

    

    

    @endsection