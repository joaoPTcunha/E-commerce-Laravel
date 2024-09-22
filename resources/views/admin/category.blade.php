<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #23272a;
            color: white;
        }

        h1 {
            color: #fff;
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
            margin-top: 40px;
        }

        .form-container {
            background-color: #2f3136;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container input[type="text"] {
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 15px;
            background-color: #3b3e44;
            color: #fff;
            border-radius: 5px;
            border: none;
        }

        .form-container input[type="submit"] {
            background-color: #7289da;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #5b6eae;
        }

        .table-container {
            margin-top: 40px;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 100%;
            max-width: 800px;
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

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
            display: inline-block;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Category</h1>

                <div class="form-container">
                    <form action="{{url('add_category')}}" method="post">
                        @csrf
                        <input type="text" name="category" placeholder="Enter Category Name" required>
                        <input type="submit" value="Add Category">
                    </form>
                </div>

                <div class="table-container">
                    <div class="table_center">
                        <table>
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>{{ $data->category_name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{url('edit_category', $data->id)}}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.js')
</body>

</html>