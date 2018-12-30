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
    <h2 class="text-center">Customer Report about This Order</h2>
    @if(!$customer_accepted)
      <p class="text-danger">Customer Rejected To Techenical Producer</p>
    @elseif($customer_accepted )
    <p class="text-danger">Customer Accepted To Techenical Producer</p>
    @endif
</body>
</html>