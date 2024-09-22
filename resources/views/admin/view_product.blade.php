<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        h1 {
            color: #fff;
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        .table_deg {
            width: 100%;
            max-width: 1000px;
            border-collapse: collapse;
            background-color: #23272a;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th {
            background-color: #7289da;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            border: 1px solid #7289da;
            padding: 12px;
            text-align: center;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #2f3136;
        }

        tr:hover {
            background-color: #3b3e44;
        }

        img {
            border-radius: 5px;
        }

        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        input[type="search"] {
            width: 500px;
            height: 45px;
            padding: 10px;
            border: 2px solid #7289da;
            border-radius: 8px;
            margin-right: 10px;
            background-color: #2f3136;
            color: white;
        }

        input[type="submit"] {
            background-color: #7289da;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #5b6eae;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #7289da;
            border-radius: 5px;
            padding: 10px 15px;
            border: 1px solid #7289da;
            margin-left: 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #7289da;
            color: white;
            border-color: #7289da;
        }

        .pagination .page-link:hover {
            background-color: #5b6eae;
            border-color: #7289da;
        }
    </style>
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>Products</h1>

                <form action="{{url('product_search')}}" method="get">
                    <input type="search" name="search" placeholder="Search products...">
                    <input type="submit" value="Search">
                </form>

                <div class="div_deg">
                    <table class="table_deg">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $products)
                            <tr>
                                <td>{{$products->title}}</td>
                                <td>{!!Str::limit($products->description,50)!!}</td>
                                <td>{{$products->category}}</td>
                                <td>${{$products->price}}</td>
                                <td>{{$products->quantity}}</td>
                                <td>
                                    <img height="120" width="120" src="products/{{$products->image}}" alt="{{$products->title}}">
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('update_product',$products->slug) }}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="div_deg">
                    {{$product->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')

</body>

</html>