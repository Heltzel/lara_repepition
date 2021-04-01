@extends('layouts.app')
@section('title', 'New Customer')
@section('content')
     <h1> New Customer</h1>
    <form action="\customer" method="POST" enctype="multipart/form-data">
        @csrf
        @include('customers.form')
         <div class="form-group">
            <button class="btn btn-primary" type="Submit">Add Customer</button>
        </div>
    </form>
@endsection
