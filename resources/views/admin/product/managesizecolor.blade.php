@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Manage Product Size  &amp; Color 
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item"><a href="#">{{$product->title}}</a></li>
        <li class="breadcrumb-item active">Manage Size &amp; Color</li>
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
	        <div class="col-xl-6 col-lg-12">
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <div class="row">
		              		<div class="col-md-8">
		              			<h3 class="box-title">List of Size</h3>
	              				<h6>{{$product->title}}</h6>
		              		</div>
		              	</div>
	            </div>
	            <table class="table">
	            	@foreach($sizes as $size)
	            	<tr>
	            		<td>{{$size->size}}</td>
	            		<td><a href="{{route('getDeleteProductSize', $size->id)}}">Delete</a></td>
	            	</tr>
	            	@endforeach
	            </table>
	            <hr>
	            <form action="{{route('postProductSizeAdd', $product->id)}}" method="POST" enctype="multipart/form-data" class="form-element">
		            	@csrf()
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputFile">Size</label>
	                  <input type="text" id="exampleInputFile" name="size">
	                </div>
	              </div>

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Add Size</button>
	              </div>
	            </form>
	          </div>
	        </div>
	        <div class="col-xl-6 col-lg-12">
	          	<div class="box box-info">
		            <div class="box-header with-border">
		              	<div class="row">
		              		<div class="col-md-8">
		              			<h3 class="box-title">List of Color</h3>
	              				<h6>{{$product->title}}</h6>
		              		</div>
		              	</div>
		            </div>
		            <table class="table">
	            	@foreach($colors as $color)
	            	<tr>
	            		<td><span style="background: {{$color->color}}; width: 40px;">{{$color->color}} </span></td>
	            		<td><a href="{{route('getDeleteProductColor', $color->id)}}">Delete</a></td>
	            	</tr>
	            	@endforeach
	            </table>
		            <hr>
		            <form action="{{route('postProductColorAdd', $product->id)}}" method="POST" enctype="multipart/form-data" class="form-element">
		            	@csrf()
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputFile">color</label>
	                  <input type="color" id="exampleInputFile" name="color">
	                </div>
	              </div>

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Add Colorss</button>
	              </div>
	            </form>
	          	</div>
	        </div>
	    </div>
</section>

@stop