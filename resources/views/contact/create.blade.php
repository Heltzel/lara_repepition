@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
    <h1>Contact Us</h1>
    @if (session('mail'))
        <div class="alert alert-success">
            {{ session('mail') }}
        </div>
    @endif
    @if(!session('mail'))
        <form action="/contact" method="POST">
        @csrf
        <div class="form-group">
            <label for="contactName">Your name</label>
            <input type="text" class="form-control {{$errors->has('contactName')? 'border-danger' : '' }}" name="contactName" value="{{old('contactName')}}" id="contactName" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="contactEmail">Your email address</label>
            <input type="email" class="form-control {{$errors->has('contactEmail')? 'border-danger' : '' }}" name="contactEmail" value="{{old('contactEmail')}}" id="contactEmail" aria-describedby="emailHelp" placeholder="Email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

            <div class="form-group">
            <label for="contactMessage">Your Message</label>
            <textarea class="form-control {{$errors->has('contactMessage')? 'border-danger' : '' }}" id="contactMessage" name="contactMessage" rows="3">{{old('contactMessage')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
@endsection
