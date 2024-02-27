@extends('layouts.layout')
@section('content')
    <h1 class="mt-5">Register</h1><br><br><br>

    <div class="container w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class='text-center mt-5'>Register</h1>

        <form id="registerForm" action="{{ route('store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <input type="hidden" name='role_id' value="1">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary bg-primary w-100">Register</button>
        </form>
    </div>

    <script>

    var formFields = document.querySelectorAll('.form-control');


    var form = document.getElementById('registerForm');

    function isEmpty(field) {
        return field.value.trim() === '';
    }


    function isValidEmail(email) {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return regex.test(email.value);
    }


    function isValidPassword(password) {
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return regex.test(password.value);
    }

    formFields.forEach(function(field) {
        field.addEventListener('keyup', function() {
            var label = document.querySelector('label[for="' + field.id + '"]');

            if (isEmpty(field) || (field.id === 'email' && !isValidEmail(field)) || (field.id === 'password' && !isValidPassword(field))) {
                label.style.color = 'red';
            } else {

                label.style.color = '';
            }
        });
    });


    </script>
@endsection
