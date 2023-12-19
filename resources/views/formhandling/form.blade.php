
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


<form action=" {{ route('formhandling.submit')}}" method ="POST" enctype="multipart/form-data">
  @csrf
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="name" value='{{ old("name")}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">Phone</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="phone" value='{{ old("phone")}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">DOB</label>
    <input type="date" class="form-control"  aria-describedby="emailHelp" name="dob" value='{{ old("dob")}}'>
  </div>

<div class="mb-3">
    <label  class="form-label">Username</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="username" value='{{ old("username")}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" name="email" value='{{ old("email")}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" value='{{ old("password")}}'>
  </div>

  <div class="mb-3">
    <label  class="form-label">File</label>
    <input type="file" class="form-control"  name="file" value=''>
  </div>

  <div class="mb-3">
    <label  class="form-label">Select Example</label>
   <select name ='select'>
 
    <option value='ABC' {{ old('select') =='ABC'  ? 'selected' : '' }} >1</option>
    <option value='CDE' {{ old('select') =='CDE'  ? 'selected' : '' }} >2</option>
   </select>

  </div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" value='true' {{ old('terms') =='true'  ? 'checked' : '' }} id="flexCheckDefault" name="terms" >
  <label class="form-check-label" for="flexCheckDefault">
    Accept Terms
  </label>
</div>
 
  <button type="submit" class="btn btn-primary" name ='submit' value='submit'>Submit</button>
</form>


</body>
</html>