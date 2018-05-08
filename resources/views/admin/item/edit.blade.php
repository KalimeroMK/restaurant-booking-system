 @extends('layouts.deshboard')

@section('page-title', 'Main Deshboard')

@section('custom-styles')
@endsection



@section('main-content') 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h3>Update Item Data</h3>
            </div>
            <div class="card-content">
              <form action="{{ route('item.update', $item->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                 <div class="form-group">
                  <label for="title">Title</label>
                  <input value="{{ $item->title }}" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                </div>         

                <div class="form-group">
                  <label for="sub_title">Sub Title</label>
                  <input value="{{ $item->sub_title }}" type="text" class="form-control" id="sub_title" placeholder="Enter Sub Title" name="sub_title">
                </div>     


                <div class="form-group">
                  <label for="catagory">Catagory</label>

                  <select name="catagory" id="catagory" class="form-control">
                    @if(count($catagories))  
                      @foreach($catagories as $catagory)
                        <option {{ $catagory->id == $item->catagory->id?'selected':'' }} value="{{ $catagory->id  }}">{{ $catagory->name }}</option> 
                      @endforeach
                    @else
                      <option value="">Catagory Not Found</option> 
                    @endif  
                  </select>
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{ $item->price }}">
                </div>                 
           

                
                  <label for="image">item Image</label>
                  <input type="file" id="image" name="image">

                <button type="submit" class="btn btn-default">Update</button>

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