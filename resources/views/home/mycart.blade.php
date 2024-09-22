<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 60px;
            flex-wrap: wrap;
        }

        .order_deg {
            max-width: 400px;
            padding-right: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 100%;
        }

        th {
            border: 2px solid black;
            color: white;
            font-weight: bold;
            background-color: black;
        }

        td {
            border: 1px solid skyblue;
        }

        .cart_value {
            text-align: center;
            margin-top: 30px;
            padding: 18px;
        }

        .div_gap {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <div class="container">

        <div>
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Remove</th>
                </tr>

                <?php $value = 0; ?>

                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>${{ number_format($cart->product->price, 2) }}</td>
                    <td>
                        <img width="150" src="/products/{{$cart->product->image}}" alt="Product Image">
                    </td>
                    <td class="text-center">
                        <a class="btn btn-danger" href="{{ url('delete_cart', $cart->id) }}">Remove</a>
                    </td>
                </tr>

                <?php $value += (float) $cart->product->price; ?>
                @endforeach
            </table>

            <div class="cart_value">
                <h3>Total Value of Cart: $ {{ number_format($value, 2) }}</h3>
            </div>
        </div>

        <div class="order_deg">
            <form action="{{ url('confirm_order') }}" method="post">
                @csrf
                <div class="div_gap">
                    <label for="name">Receiver Name</label>
                    <input type="text" name="name" id="name" value="{{Auth::user()->name}}" required>
                </div>
                <div class="div_gap">
                    <label for="address">Receiver Address</label>
                    <textarea name="address" id="address" required>{{Auth::user()->address}}</textarea>
                </div>
                <div class="div_gap">
                    <label for="phone">Receiver Phone</label>
                    <input type="number" name="phone" id="phone" value="{{Auth::user()->phone}}" required>
                </div>
                <div class="div_gap">
                    <input class="btn btn-primary" type="submit" value="Cash On Delivery">
                    <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
                </div>
            </form>
        </div>
    </div>

    @include('home.footer')
</body>

</html>