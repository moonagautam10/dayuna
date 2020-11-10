@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Manage Product photo 
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item"><a href="#">{{$product->title}}</a></li>
        <li class="breadcrumb-item active">Manage</li>
      </ol>
    </section>
    <section class="content">
    	@if(session('message'))
	            	<div class="row">
	            		<div class="col-md-12">
	            			<div class="alert alert-success">
	            				<button type="button" class="close" data-dismiss='alert' aria-label='Close'>
	            					<i class="material-icons"></i>
	            				</button>
	            				<span>{{session('message')}}</span>
	            			</div>
	            		</div>
	            	</div>
	            	@endif
	    <div class="row">

	        <div class="col-xl-7 col-lg-12">
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">List of photo</h3>
	              <h6>{{$product->title}}</h6>
	            </div>
	            <table class="table">
	            	@foreach($photos as $photo)
	            	<tr>
	            		<td><img src="{{asset('site/product/'.$photo->photo)}}" alt="" width="60"></td>
	            		<td><a href="{{route('getProductPhotoDelete', $photo->id)}}">Delete</a></td>
	            	</tr>
	            	@endforeach
	            </table>
	          </div>
	        </div>
	        <div class="col-xl-5 col-lg-12">
	          	<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">Add Photo</h3>
		            </div>
		            <form action="{{route('postProductPhotoAdd', $product->id)}}" method="POST" enctype="multipart/form-data" class="form-element">
		            	@csrf()
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputFile">Photo</label>
	                  <input type="file" id="exampleInputFile" name="photo">

	                  <p class="help-block text-red">Photo size must be XXX</p>
	                </div>
	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Add</button>
	              </div>
	            </form>
	          	</div>
	        </div>
	    </div>
</section>

@stop