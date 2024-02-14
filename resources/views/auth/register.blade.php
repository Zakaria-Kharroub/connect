@extends('layouts.layout')
@section('content')
    <h1 class="mt-5">login</h1><br><br><br>
    

    <div class="container w-50">

        <h1 class='text-center mt-5'>
            register
        </h1>

        <form action="store" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <input type="hidden" name='role_id' value="1">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>   
            </div>

            {{-- <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" name="bio" required></textarea>
            </div> --}}

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>


            
            <button type="submit" name="submit" class="btn btn-primary bg-primary w-100">register</button>

        </form>
        

    </div>

    
    

    

    

    @endsection