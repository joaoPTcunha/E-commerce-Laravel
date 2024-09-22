<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #23272a;
            color: #fff;
        }

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
            margin-top: 60px;
        }

        .form-container {
            background-color: #2f3136;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container label {
            display: block;
            width: 100%;
            font-size: 18px;
            color: #fff;
            margin-bottom: 10px;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea,
        .form-container select,
        .form-container input[type="file"] {
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 15px;
            background-color: #3b3e44;
            color: #fff;
            border-radius: 5px;
            border: 1px solid #7289da;
        }

        .form-container textarea {
            height: 100px;
        }

        .form-container input[type="file"] {
            background-color: #3b3e44;
            color: #fff;
            padding: 10px;
            border: 1px solid #7289da;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .form-container input[type="file"]::file-selector-button {
            background-color: #7289da;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container input[type="file"]::file-selector-button:hover {
            background-color: #5b6eae;
        }

        .form-container .btn-success {
            background-color: #7289da;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .form-container .btn-success:hover {
            background-color: #5b6eae;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Add Product</h1>

                <div class="div_deg">
                    <div class="form-container">
                        <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <label>Product Title</label>
                            <input type="text" name="title" required>

                            <label>Description</label>
                            <textarea name="description" required></textarea>

                            <label>Price</label>
                            <input type="text" name="price" required>

                            <label>Quantity</label>
                            <input type="number" name="qty" required>

                            <label>Product Category</label>
                            <select name="category" required>
                                <option>Select an Option</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>

                            <label>Product Image</label>
                            <input type="file" name="image">

                            <input class="btn btn-success" type="submit" value="Add Product">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.js')
</body>

</html>