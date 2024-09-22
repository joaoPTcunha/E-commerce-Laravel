<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        body {
            background-color: #23272a;
            color: white;
        }

        h1 {
            color: #fff;
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            max-width: 1200px;
            border-collapse: collapse;
            background-color: #2f3136;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th,
        td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #7289da;
            color: white;
            font-size: 18px;
        }

        td {
            border: 1px solid #7289da;
        }

        tr:nth-child(even) {
            background-color: #3b3e44;
        }

        tr:nth-child(odd) {
            background-color: #2f3136;
        }

        tr:hover {
            background-color: #4e5058;
        }

        img {
            width: 100px;
            border-radius: 8px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
            display: inline-block;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .status-red {
            color: #dc3545;
            font-weight: bold;
        }

        .status-green {
            color: #28a745;
            font-weight: bold;
        }

        .status-orange {
            color: #fd7e14;
            font-weight: bold;
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
            background-color: #2f3136;
            text-decoration: none;
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
                <h1>All Orders</h1>

                <div class="table_center">
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Print PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->rec_address}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->product->title}}</td>
                                <td>${{$order->product->price}}</td>
                                <td>
                                    <img src="products/{{$order->product->image}}" alt="Product Image">
                                </td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    @if($order->status == 'in progress')
                                    <span class="status-red">In Progress</span>
                                    @elseif($order->status == 'Delivered')
                                    <span class="status-green">Delivered</span>
                                    @else
                                    <span class="status-orange">{{$order->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{url('on_the_way', $order->id)}}">On the way</a>
                                    <a class="btn btn-success" href="{{url('delivered', $order->id)}}">Delivered</a>
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="{{url('print_pdf', $order->id)}}">Print PDF</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    {{$data->onEachSide(1)->links()}}
                </div>

            </div>
        </div>
    </div>

    @include('admin.js')
</body>

</html>