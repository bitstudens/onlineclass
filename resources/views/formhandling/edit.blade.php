
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action=" {{ route('product.update', $product->id)}}" method ="POST" enctype="multipart/form-data">
@method('put')  
@csrf
<div class="mb-3">
    <label  class="form-label">Category</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="category" value='{{ old("name") ? old("name") : $product->category}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">Date</label>
    <input type="date" class="form-control"  aria-describedby="emailHelp" name="date" value='{{ old("date")  ? old("date") : $product->date}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">Price</label>
    <input type="number" class="form-control"  aria-describedby="emailHelp" name="price" value='{{ old("dob")  ? old("dob") : $product->price}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">File</label>
    <input type="file" class="form-control"  name="file" value=''>

    @if($product->file)
    <img src="{{ $product->file }}" >
   @endif 

  </div>

  <div class="mb-3">
    <label  class="form-label">Status</label>
   <select name ='status'>
 
    <option value='1' {{ old('select') =='1'  ? 'selected' : '' }} >Active</option>
    <option value='0' {{ old('select') =='0'  ? 'selected' : '' }} >Inactive</option>
   </select>

  </div>
 
  <button type="submit" class="btn btn-primary" name ='submit' value='submit'>Submit</button>
</form>


</body>
</html>