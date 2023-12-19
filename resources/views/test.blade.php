<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

.danger{
    color:red;
}

.success{
    color:green;
}

</style>
</head>
<body>
   
<!-- coimmment -->
{{-- Conditional statements --}}

@php
    $isEligible =false;
    $age =12;
    if($age >=18){
        $isEligible =true;
    }

@endphp


<div>

<p @class([
    'danger' => !$isEligible,
    'success' => $isEligible,
    ])>
    Test Class</p>
</div>


</body>
</html>