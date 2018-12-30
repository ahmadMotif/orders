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
    <h2 class="text-center">New Printing Order</h2>
    <p>Dear <strong> Company Management : </strong></p>
    <hr>
    <p>I Send Printing Order, Please Check It</p>
    <br>
    <a href="{{ route('customers-orders.show', $id) }}">{{ $title }}</a>
    <br>
    <p>from:</p>
    <a href="{{ route('customers.show', $customer->id) }}">{{ $customer->name }}</a>
  </div>
</body>
</html>