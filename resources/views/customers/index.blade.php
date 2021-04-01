@extends('layouts.app')
@section('title', ' Customer List')
@section('content')
   <h1>Customers Index</h1>
   @can('create', App\Customer::class)
     <p><a href="/customer/create"> Add New Customer</a></p>
   @endcan
   <div class="row">
       <div class="col-12">
           @foreach($customers as $customer)
            <li class="list-group-item">
                <div class="row">
                    <span class="col-2">
                        <span class="badge badge-pill badge-primary mr-2">{{$customer->id}}  </span>
                        <a href="/customer/{{$customer->id}}">
                            {{$customer->name}}
                        </a>
                    </span>
                    <span class="col-4">{{$customer->email}}</span>
                    <span class="col-2">{{$customer->active}}</span>
                    <span class="col-4">{{$customer->company->name}}</span>
                </div>
            </li>
           @endforeach
       </div>
   </div>
   {{-- pagination --}}
   <div class="row">
       <div class="col-12">
           <div class="d-flex justify-content-center mt-3">
               {{$customers->links()}}
           </div>
       </div>
   </div>
   {{--
    <div class="row">
        <div class="col-6">
            <label for="activeCustomers">Active</label>
            <ul class="list-group" id="activeCustomers">
                @foreach($activeCustomers as $customer)
                    <li class="list-group-item">
                        <div class="row">
                            <span class="col-2">
                                <a href="/customer/{{$customer->id}}">
                                    {{$customer->name}}
                                </a>
                            </span>
                            <span class="col-4">{{$customer->email}}</span>
                            <span class="col-2">{{$customer->active}}</span>
                            <span class="col-4">{{$customer->company->name}}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <label for="inactiveCustomers">Inactive</label>
            <ul class="list-group" id="inactiveCustomers" >
                @foreach($inactiveCustomers as $customer)
                    <li class="list-group-item">
                        <div class="row">
                            <span class="col-2">
                                <a href="/customer/{{$customer->id}}">
                                 {{$customer->name}}
                                </a>
                            </span>
                            <span class="col-4">{{$customer->email}}</span>
                            <span class="col-2">{{$customer->active}}</span>
                            <span class="col-4">{{$customer->company->name}}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    --}}

{{--
    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h5 class="mt-3">{{$company->name}}</h5>
                <ul class="list-group">
                    @foreach($company->customers as $customer)
                        <li class="list-group-item">{{$customer->name}}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div> --}}

@endsection
