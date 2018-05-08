@extends('layouts.deshboard')

@section('page-title', 'Main Deshboard')

@section('custom-styles')
@endsection



@section('main-content') 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h3>Update Catagory Data</h3>
            </div>
            <div class="card-content">
              <form action="{{ route('catagory.update', $catagory->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="name">Catagory Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Catagory name" name="name" value="{{ $catagory->name }}">
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