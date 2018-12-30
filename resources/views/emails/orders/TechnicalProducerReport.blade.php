<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Company Name</title>
</head>
<body>
  <div class="container bg-light">
    <h2 class="text-center">Admin Report about This Order</h2>
    @if(!$accepted)
      <p class="text-dangr">We Sorry For That We <strong>Rejected</strong> Your Order!!!</p>
    @elseif($accepted )
      @if($customer)
        <p class="text-success">We<strong>Accepted</strong> You Can Follow It On Your Account!</p>
        <a class="btn btn-success" href="{{ url('/home') }}">To Website</a>
      @endif
    @endif
</body>
</html