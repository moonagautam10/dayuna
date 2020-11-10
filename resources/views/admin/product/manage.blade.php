@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
       Manage Product
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
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
			             	 <h4 class="box-title">Manage Your Product</h4>
			             </div>
			             <div class="col-md-2">
			             	<a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Product</a>
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
									<th>Product</th>
									<th>Cost</th>
									<th>Posted Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $item)
								<tr>
									<td><img src="{{asset('site/product/'.$item->photo)}}" alt="" width="120"></td>
									<td>{{$item->title}}</td>
									<td>
										@if($item->dcost == null)
											RM {{$item->rcost}}
										@else
											RM {{$item->rcost}} RM {{$item->dcost}}
										@endif
									</td>
									<td>{{$item->created_at}}</td>
									<td><a href="{{route('getProductPhotoAdd', $item->id)}}">Photo</a> | <a href="{{route('getManageSizeColor', $item->id)}}">Size/Color</a> | <a href="{{route('getDeleteProduct', $item->id)}}">Delete</a> | 	<a href="{{route('getProductEdit',$item->id)}}">Edit</a>  | Toggle</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form class="form-element" action="{{route('postProductAdd')}}" method="POST" enctype="multipart/form-data">
      		@csrf()
	      <div class="modal-body">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Product Name</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" name="title" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Catagory</label>
	                  <select class="form-control" name="catagory_id" required>
	                  	<option value="">Select Catagory</option>
	                  	@foreach($catagories as $catagory)
	                  	<option value="{{$catagory->id}}">{{$catagory->title}}</option>
	                  	@endforeach
	                  </select>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Product Cost</label>
	                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Cost" name="rcost" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Detail</label>
	                  <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="About the product" name="detail" required></textarea>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Additional Information</label>
	                  <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Addition information about prodoct" name="additionalinformation"></textarea>
	                </div>

	                <div class="form-group">
	                  <label for="exampleInputFile">Photo *</label>
	                  <input type="file" id="exampleInputFile" required name="photo">
	                  <p class="help-block text-red">File Slider image size must be XXXX size</p>
	                </div>
	                <div class="form-group">
	                	<label for="exampleInputFile">Show on</label>
	                	<div class="demo-checkbox">
							<input type="checkbox" name="new" id="basic_checkbox_1">
							<label for="basic_checkbox_1">New</label>
							<input type="checkbox" name="featured" id="basic_checkbox_2">
							<label for="basic_checkbox_2">Featured</label>
							<input type="checkbox" name="collection" id="basic_checkbox_3">
							<label for="basic_checkbox_3">Collection</label>
						</div>
	                 	
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