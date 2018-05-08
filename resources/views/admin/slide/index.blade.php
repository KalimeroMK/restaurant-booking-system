@extends('layouts.deshboard')

@section('page-title', 'Main Deshboard')

@section('custom-styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection



@section('main-content') 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <a href="{{ route('slide.create') }}" class="btn btn-success">Add New slide</a>
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h3>VIEW ALL SLIDES </h3>
            </div>
            <div class="card-content">
               <table id="table" class="table table-striped table-bordered" style="width:100%">
                 <thead>
                  <tr>
                    <th><strong>ID</strong></th>
                    <th><strong>TITLE</strong></th>
                    <th><strong>SUB TITLE</strong></th>
                    <th><strong>IMAGE</strong></th>
                    <th><strong>ACTION</strong></th>
                  </tr>
                </thead>
              @if(count($slides))
                <tbody>
                  @foreach($slides as $key=>$slide)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->sub_title }}</td>
                    <td><img src="/upload/slides/{{$slide->image}}" alt="Slide" style="max-width: 200px;"></td>
                    <td>
                        <a href="{{ route('slide.edit', $slide->id) }}" class="btn btn-warning edit-btn">EDIT</a>

                        <form action="{{ route('slide.destroy', $slide->id)}}" class="delete-btn" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>  
               @endif 
              </table>                
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
.edit-btn, .delete-btn{display: inline-block;}
</style>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endsection