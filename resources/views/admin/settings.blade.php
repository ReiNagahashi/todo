@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">Edit settings</div>
    
        <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                          <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{route('settings.update')}}"　method="POST">
                @csrf
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                <input type="text" class="form-control" name="site_name"value="{{$settings->site_name}}">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact number</label>
                    <input type="text" class="form-control" name="contact_number"value="{{$settings->contact_number}}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" class="form-control" name="contact_email"value="{{$settings->contact_email}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address"value="{{$settings->address}}">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-lg btn-primary">Update Settings</button>
                </div>
            </form>
        </div>
    </div>
    @endsection