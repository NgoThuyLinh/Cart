<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<form  role="form" method="POST" action="{{asset('product')}}/{{ $product->id }}">
    @csrf
    <input name="_method" type="hidden" value="PUT">
		<div class="form-group">
    	<label class="control-label">Name</label>
    	<div class="" style="padding-bottom: 30px">
    		<div >
          	<input type="text" class="form-control" name="name"  required="" value="{{ $product->name }}">
      	</div>
      	@if($errors->has('name'))
      		<p>{{$errors->first('name')}}</p>
      	@endif
    	</div>
    </div>        
    <div class="form-group">
    	<label class="control-label">Price</label>
    	<div class="" style="padding-bottom: 30px">
    		<div>
          	<input type="number" class="form-control" name="price" required="" value="{{ $product->price }}">
      	</div>
    	</div>
    	@if($errors->has('price'))
    		<p>{{$errors->first('price')}}</p>
    	@endif
    </div>
    <div class="form-group">
    	<label class="control-label">Quantity</label>
    	<div class="" style="padding-bottom: 30px">
    		<div>
          	<input type="number" class="form-control" name="quantity" required="" value="{{ $product->quantity }}">
      	</div>
      	@if($errors->has('quantity'))
      		<p>{{$errors->first('quantity')}}</p>
      	@endif
    	</div>
    </div>
		<button type="submit" name="submit" class="btn btn-primary">Update</button>
       
	</form>
</body>
</html>