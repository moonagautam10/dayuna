@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Edit Product
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
	    <div class="col-12">
	        <div class="box">
	            <div class="box-header">
	            	<div class="row">
			             <div class="col-md-10">
			             	 <h4 class="box-title">Edit Your Product</h4>
			             </div>
			             <div class="col-md-2">
			             	<a href="{{route('getProductManage')}}" class="btn btn-primary">Manage Product</a>
			             </div>
	         		</div>
	            </div>
	            <div class="box-body">
				<form class="form-element" action="{{route('postProductEdit',$product->id)}}" method="POST" enctype="multipart/form-data">
      		@csrf()
	      <div class="modal-body">
	              <div class="box-body">
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
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Product Name</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product->title}}" name="title" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Catagory</label>
	                  <select class="form-control" name="catagory_id" required >
	                  	<option value="">Select Catagory</option>
	                  	@foreach($catagories as $catagory)
	                  	<option value="{{$catagory->id}}"<?php if($catagory->id == $product->catagory_id){ echo 'selected';} else {echo '';} ?>>{{$catagory->title}}</option>
	                  	@endforeach	                  
	                  </select> 
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Product Cost</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product->rcost}}" name="rcost" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Detail</label>
	                  <textarea type="text" class="form-control" id="exampleInputEmail1" name="detail" required>{{$product->detail}}</textarea>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Additional Information</label>
	                  <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Addition information about prodoct" name="additionalinformation">{{$product->additionalinformation}}</textarea>
	                </div>

	                <div class="form-group">
	                  <label for="exampleInputFile">Photo *</label>
	                  <input type="file" id="exampleInputFile"  name="photo"><br>
	                  <img src="{{asset('site/product/'.$product->photo)}}" width="100">
	                  <p class="help-block text-red">File Slider image size must be XXXX size</p>
	                </div>
	                <div class="form-group">
	                	<label for="exampleInputFile">Show on</label>
	                	<div class="demo-checkbox">
							<input type="checkbox" name="new" id="basic_checkbox_1" <?php if($product->new =='Y'){echo 'checked';} ?>>
							<label for="basic_checkbox_1">New</label>
							<input type="checkbox" name="featured" id="basic_checkbox_2" <?php if($product->featured =='Y'){echo 'checked';} ?>>
							<label for="basic_checkbox_2">Featured</label>
							<input type="checkbox" name="collection" id="basic_checkbox_3" <?php if($product->collection =='Y'){echo 'checked';} ?>>
							<label for="basic_checkbox_3">Collection</label>
						</div>
	                 	
	                </div>
	              </div>
	      </div>
	      <div class="modal-footer">
	        
	        <button type="submit" class="btn btn-primary">edit</button>
	      </div>
	  </form>	
	            </div>
	        </div>         
	    </div>
    </div>
</section>

<!-- Modal -->

@stop