@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Edit Catagory
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Catagory</a></li>
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
			             	 <h4 class="box-title">Edit Your Catagory</h4>
			             </div>
			             <div class="col-md-2">
			             	<a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Manage Catagory</a>
			             </div>
	         		</div>
	            </div>
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
					<form class="form-element" action="{{route('postCatagoryEdit',$catagory->id)}}" method="POST" enctype="multipart/form-data">
      		@csrf()
	      <div class="modal-body">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Title</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{$catagory->title}}" name="title" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputFile">Photo *</label>
	                  <input type="file" id="exampleInputFile" name="photo">
	                  <img src="{{asset('site/catagory/'.$catagory->photo)}}" width="100">

	                  <p class="help-block text-red">File Slider image size must be XXXX size</p>
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