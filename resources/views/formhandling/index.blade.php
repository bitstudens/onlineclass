
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>

@if(session('message'))
<div class="alert alert-success" role="alert">
  {{ session('message')}}
</div>

@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error')}}
</div>
@endif


<a href='{{ route("product.form")}} ' class='btn btn-primary'>Create New</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">category</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($products as $product)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $product->category }}</td>
      <td>{{ $product->date}}</td>
      <td>{{ $product->price}}</td>
      <td><a href='{{ route("product.edit",$product->id)}}' class="btn btn-primary">Edit </a> <a href='{{route("product.delete",$product->id)}}' class="btn btn-danger">Delete </a></td>
    </tr>
    @empty
        <tr> <td colspan='9' align='center'> No Records available </td></tr>
    @endforelse
    
    
  </tbody>
</table>

{{ $products->links()}}


</body>
</html>