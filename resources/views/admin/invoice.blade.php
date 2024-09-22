<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #333;
        }

        h3 {
            color: #555;
        }

        .header {
            background-color: skyblue;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .content {
            padding: 20px;
            text-align: left;
        }

        .details {
            margin-top: 20px;
        }

        .details h2 {
            color: skyblue;
            margin-bottom: 10px;
        }

        .details img {
            border-radius: 8px;
            margin-top: 10px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Order Details</h1>
        </div>
        <div class="content">
            <h3>Customer Name: {{$data->name}}</h3>
            <h3>Customer Address: {{$data->rec_address}}</h3>
            <h3>Phone: {{$data->phone}}</h3>

            <div class="details">
                <h2>Product Information</h2>
                <h3>Product Title: {{$data->product->title}}</h3>
                <h3>Price: ${{$data->product->price}}</h3>
                <img height="250" width="300" src="products/{{$data->product->image}}" alt="Product Image">
            </div>
        </div>
        <div class="footer">
            <p>Thank you for shopping with us!</p>
        </div>
    </div>
</body>

</html>