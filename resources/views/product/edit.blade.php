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
   

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                <h1>Create Product</h1>
                    <form action="{{route('product.update',$product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        </div><br>

                         <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" cols="10">{{$product->description}}</textarea>

                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div><br>


                         <div class="form-group">
                        <label>Current Product Image</label>
                        <img src="{{asset($product->image)}}" height="200px" width="200px">
                        </div><br>

                         <div class="form-group">
                        <label>New Product Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"> 
                         @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div><br>

                        <div>
                        <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
