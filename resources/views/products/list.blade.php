<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type="text/css">
		th{
			padding: 5px;
			text-align: center;
		}
		table,h1{
			text-align: center;
		}
		
	</style>
</head>
<body>
	<div class="container-fluid">
		
		<form class="col-md-10 col-md-offset-1">
			<div class="row" style="border-bottom: 2px solid #969292; ">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr><h1 style="margin-bottom: 50px">LIST PRODUCTS </h1></tr>
						<tr>
							@if(session()->has('flag'))
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>Success!</strong> {{session()->get('flag')}}
								</div>
							@endif
						</tr>
						<tr>
							<button type="button" data-toggle="modal" data-target="#add" class="btn btn-success add"  style="margin-bottom: 50px">Add</button>
							<a href="{{route('product.create')}}" class="btn btn-success" style="margin-bottom: 50px">Creat</a>
						</tr>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Cost</th>
							<th>Quantity</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody  id="tasks-list">
						@foreach ($products as $product)
						
							<tr id="task{{$product->id}}">
								<td>{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td align="right">{{ $product->price }}</td>
								<td align="right">{{ $product->quantity }}</td>
								<td>
									<a href="{{route('product.show',[ $product->id])}}" class="btn btn-success">Show</a>
									<button type="button" class="btn btn-info detail" data-toggle="modal" data-target="#detail" style="margin-right: 15px;" data-id="{{ $product->id }}">Detail</button>
									<a href="{{asset('')}}product/{{ $product->id }}/edit" class="btn btn-warning"  style="margin-right: 15px;">Update</a>
									
									<button type="button" data-toggle="modal" data-target="#edit" class="btn btn-success edit" style="margin-right:15px;" data-id="{{ $product->id }}">Edit</button>
									<button type="button" class="btn btn-danger delete" data-id="{{ $product->id }}">Delete</button>
								</td>
							</tr>
							
						@endforeach
					</tbody>
				</table>
				{{$products->links()}}
			<!-- Detail -->
				<div id="detail" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Informatin product: <span id="name"></span></h4>
				      </div>
				      <div class="modal-body">
				        <p>Price: <span id="price"></span></p>
				        <p>Quantity: <span id="quantity"></span></p>
				        <p>Date_public: <span id="date_public"></span></p>
				        <p>Date_update: <span id="date_update"></span></p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>
			<!--  -->
			<!-- Edit -->
				<div id="edit" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Update product</h4>
				      </div>
				      <div class="modal-body">
				      	<form  role="form" method="POST" id="form_edit">
							<div class="form-group">
					          	<label class="control-label">Name</label>
					          	<div class="" style="padding-bottom: 30px">
					          		<div >
						              	<input type="text" class="form-control" name="name" id="name_edit" required="">
					            	</div>
					            	
					          	</div>
					        </div>        
					        <div class="form-group">
					          	<label class="control-label">Price</label>
					          	<div class="" style="padding-bottom: 30px">
					          		<div>
						              	<input type="number" class="form-control" name="price" id="price_edit" required="">
					            	</div>
					          	</div>
					        </div>
					        <div class="form-group">
					          	<label class="control-label">Quantity</label>
					          	<div class="" style="padding-bottom: 30px">
					          		<div>
						              	<input type="number" class="form-control" name="quantity" id="quantity_edit" required="">
					            	</div>
					          	</div>
					        </div>
					       
						</form>
				      </div>
				      <div class="modal-footer">
				        <button type="submit" class="btn btn-primary" name="submit" id="update">Update</button>
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

				      </div>
				    </div>

				  </div>
				</div>
			<!--  -->
			<!-- Add -->
				<div id="add" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Creat product</h4>
				      </div>
				      <div class="modal-body">
				      	<form  role="form" id="form_add" method="POST" action="{{asset('product')}}/store">
							<div class="form-group">
					          	<label class="control-label">Name</label>
					          	<div class="" style="padding-bottom: 30px">
					          		<div >
						              	<input type="text" class="form-control" name="name" value="" required="">
					            	</div>
					            	
					          	</div>
					        </div>        
					        <div class="form-group">
					          	<label class="control-label">Price</label>
					          	<div class="" style="padding-bottom: 30px">
					          		<div>
						              	<input type="number" class="form-control" name="price" value="" required="">
					            	</div>
					          	</div>
					        </div>
					        <div class="form-group">
					          	<label class="control-label">Quantity</label>
					          	<div class="" style="padding-bottom: 30px">
					          		<div>
						              	<input type="number" class="form-control" name="quantity" value="{{old('name')}}" required="">
					            	</div>
					          	</div>
					        </div>
					       
						</form>
				      </div>
				      <div class="modal-footer">
				        <button type="submit" name="submit" class="btn btn-primary" >Creat</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				      </div>
				    </div>

				  </div>
				</div>
			<!-- ../- - - -  -->
			</div>

		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	var url_base="{{asset('product')}}";
	$.ajaxSetup({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script>
<script type="text/javascript" src="{{asset('js/product.js')}}">
	
</script>