@extends('layouts.deshboard')

@section('page-title', 'Main Deshboard')

@section('custom-styles')
@endsection



@section('main-content') 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h3>New User Register </h3>
                <span>(Please enter valide user info)</span>
            </div>
            <div class="card-content">
              <form action="{{ route('user.store')}}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>                

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                
                <div class="form-group">
                  <label for="pwd_confirmation">Confurm Password:</label>
                  <input type="password" class="form-control" id="pwd_confirmation" placeholder="Re-enter password" name="pwd_confirmation">
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