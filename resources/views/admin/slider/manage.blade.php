@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Manage Slider
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Sldier</a></li>
        <li class="breadcrumb-item active">Manage</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
	    <div class="col-12">
	        <div class="box">
	            <div class="box-header">
	            	<div class="row">
			             <div class="col-md-10">
			             	 <h4 class="box-title">Manage Your Slider</h4>
			             </div>
			             <div class="col-md-2">
			             	<a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Slider</a>
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
					<div class="table-responsive">
					  	<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th></th>
									<th>Title</th>
									<th>Sub Title</th>
									<th>Posted Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sliders as $slider)
								<tr>
									<td><img src="{{asset('site/slider/'.$slider->photo)}}" alt="" width="120"></td>
									<td>{{$slider->title}}</td>
									<td>{{$slider->subtitle}}</td>
									<td>{{$slider->created_at}}</td>
									<td>
										<a href="{{route('getSliderDelete', $slider->id)}}">Delete</a> |
										<a href="{{route('getSliderEdit',$slider->id)}}">Edit</a>  | <a href="">
											
										Toggle
									</a>
										
									</td>

								</tr>
								@endforeach
								
							</tbody>
					  	</table>
					</div>
	            </div>
	        </div>         
	    </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form class="form-element" action="{{route('postSliderAdd')}}" method="POST" enctype="multipart/form-data">
      		@csrf()
	      <div class="modal-body">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Slider Title</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slider Title" name="title">
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputPassword1">Slider Sub Title</label>
	                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slider Sub Title" name="subtitle">
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputPassword1">Link</label>
	                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slider Link" name="link">
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputFile">Photo *</label>
	                  <input type="file" id="exampleInputFile" required name="photo">

	                  <p class="help-block text-red">File Slider image size must be XXXX size</p>
	                </div>
	              </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	  </form>
    </div>
  </div>
</div>
@stop