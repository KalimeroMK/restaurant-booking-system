@extends('layouts.deshboard')

@section('page-title', 'Main Deshboard')

@section('custom-styles')
@endsection



@section('main-content') 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h3>Add New Catagory</h3>
            </div>
            <div class="card-content">
              <form action="{{ route('catagory.store')}}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name">Catagory Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Catagory name" name="name">
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