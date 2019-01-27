@extends('layouts.teamLayout')
@section('title', 'Team')
@section('content')
<!-- Content Header (Page header) -->
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="alert alert-danger">
  <ul>
    <li>Image dimension should be 375x446</li>
  </ul>
</div>
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <button type="button" class="btn btn-info pull-right" style="margin-bottom: 15px;" onclick="AddMore()">Add More</button>
            <form action="{{url('add-team')}}" class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
              {{csrf_field()}}
              <table id="teamFields" class="table table-bordered dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th class="text-success">Name</th>
                    <th class="text-success">Image</th>
                    <th class="text-success">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(old('names'))
                    @foreach(old('names')  as $values)
                      <tr>
                    <td><input type="text" name="names[]" id="names" value="{{$values}}" class="form-control col-md-4"></td>
                    <td><input type="file" name="images[]" id="images" value=""  class="form-control col-md-4"></td>
                    <td><button type="button" class="btn btn-info pull-danger deleteRow">Delete</button></td>
                  </tr>
                    @endforeach
                  @else
                  <tr>
                    <td><input type="text" name="names[]" id="names" value="{{old('names')}}" class="form-control col-md-4"></td>
                    <td colspan="2"><input type="file" name="images[]" id="images" value="{{old('images')}}"  class="form-control col-md-4"></td>
                    
                  </tr>
                  @endif
                </tbody>
              </table>
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
              </div>
              </form>
          </div>
        </div>
      </div>
  </div>
	<script type="text/javascript">
  function AddMore(){

     var data='<tr>';
          data += '<td><input type="text" name="names[]" id="names" class="form-control col-md-4"></td>';
          data += '<td><input type="file" name="images[]" id="images"  class="form-control col-md-4"></td>';
          data += '<td><button type="button" class="btn btn-danger deleteRow">Delete</button></td>';
          data += '</tr>';
          $('#teamFields tr:last').after(data);
  }
  $(document).ready(function(){
    
    $("#teamFields").on('click','.deleteRow',function(){
        $(this).parent().parent().remove();
    });
}); 
</script>
@endsection