@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Edit Slider
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Sldier</a></li>
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
			             	 <h4 class="box-title">Edit Your Slider</h4>
			             </div>
			             <div class="col-md-2">
			             	<a href="{{route('getSliderManage')}}" class="btn btn-primary">Manage Slider</a>
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
	            	<form class="form-element" action="{{route('postSliderEdit',$slider->id)}}" method="POST" enctype="multipart/form-data">
      		@csrf()
	     		 <div class="modal-body">
	              <div class="box-body">
	              	
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Slider Title</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{$slider->title}}" name="title" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputPassword1">Slider Sub Title</label>
	                  <input type="text" class="form-control" id="exampleInputPassword1" value="{{$slider->subtitle}}" name="subtitle">
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputPassword1">Link</label>
	                  <input type="text" class="form-control" id="exampleInputPassword1" value="{{$slider->link}}" name="link">
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputFile">Photo *</label>
	                  <input type="file" id="exampleInputFile"  name="photo">
	                  <img src="{{asset('site/slider/'.$slider->photo)}}" width="100">
	                  <p class="help-block text-red">File Slider image size must be XXXX size</p>
	                </div>
	              </div>
	      </div>
	      <div class="modal-footer">
	        
	        <button type="submit" class="btn btn-primary">Edit</button>
	      </div>
	  </form>
	            </div>
	        </div>         
	    </div>
    </div>
</section>

<!-- Modal -->

@stop