@extends('layouts.app')
@section('title', 'Edit Customer')
@section('content')
     <h1> Edit Customer {{$customer->name}}</h1>
    <form action="{{route('customer.update', ['customer' => $customer])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('customers.form')
         <div class="form-group">
            <button class="btn btn-primary" type="Submit">Update Customer</button>
        </div>
    </form>
@endsection
