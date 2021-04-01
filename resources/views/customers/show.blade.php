 @extends('layouts.app')
@section('title', 'New Customer')
@section('content')
     <h1> Show Customer: {{$customer->name}}</h1>
     <div class="row">
       @can('update', $customer)
        <div class="col-1">
           <button class="btn btn-link" > <a href="{{route('customer.edit',$customer->id) }}">Edit</a></button>
         </div>
       @endcan

         {{-- Delete a paricular instance of Customer --}}
         @can('delete', $customer)
            <div class="col-1">
                <form action="{{route('customer.destroy',$customer->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link text-danger" type="Submit">Delete</button>
                </form>
            </div>
         @endcan
     </div>
     <div class="row">
        <div class="col-6">
            <ul class="list-group">
                <li class="list-group-item"> Name: {{$customer->name}}</li>
                <li class="list-group-item"> Email: {{$customer->email}}</li>
                <li class="list-group-item"> Company: {{$customer->company->name}}</li>
                <li class="list-group-item"> Status: {{$customer->active}}</li>
            </ul>
        </div>
        {{-- @foreach($customer->getAttributes() as $key => $value)
            {{$key}}
        @endforeach --}}
     </div>
     @if($customer->image)
            <div class="row">
                <div class="col-12">
                 <img src="{{asset('storage/'.$customer->image)}}" alt="" class="img-thumbnail">
                </div>
            </div>
        @endif
@endsection
