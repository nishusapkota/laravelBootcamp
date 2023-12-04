<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Product</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Product</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <div>
    <a href="{{route('product.create')}}" class="btn btn-dark mt-2">Add Product</a>
    </div>
        <div class="row justify-content-center">

        @if(session('message'))
        <div class='alert alert-success'>
        {{session('message')}}
        </div>
        @endif

        @if(session('danger'))
        <div class='alert alert-danger'>
        {{session('danger')}}
        </div>
        @endif
       
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                <h1>Product List</h1>
                <table class="border-gray-200">
                <tr class="bg-dark text-white">
                <th>SN</th>
                <th>Name</th>
                 <th>Description</th>
                  <th>Image</th>
                   <th>Action</th>
                </tr>
                @foreach($products as $product)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                <img src={{asset($product->image)}} height="200px" width="200px">
                </td>
                <td>
                <a href="{{route('product.edit',$product)}}" class="btn btn-primary">Edit</a>
                <form class="inline" action="{{route('product.destroy',$product)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
                </td>

                </tr>
                @endforeach
                </table>
                </div>
            </div>
        </div>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
