@extends('layouts.deshboard')

@section('page-title', 'Main Deshboard')

@section('custom-styles')
@endsection



@section('main-content') 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h3>Update User Data</h3>
                <span>(Please enter valide user info)</span>
            </div>
            <div class="card-content">
              <form action="{{ route('user.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $user->name }}">
                </div>                

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $user->email }}">
                </div>
                

                <button type="submit" class="btn btn-default">Submit</button>
              </form>
                
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
    
</div>

@endsection


@section('custom-scripts')
<style>
.alert-dismissible .close {top: 0;right: 0;}
</style>
@endsection