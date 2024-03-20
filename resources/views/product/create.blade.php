<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Create</h1>
    <div>Product</div>

    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form action="{{ route('product.insert') }}" method="post">
        @csrf
        @method('post')

        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="name">
        </div>
        <div class="">
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="description">
        </div>
        <div class="">
            <label for="price">Price</label>
            <input type="text" name="price" placeholder="price">
        </div>
        <div class="">
            <label for="test">test</label>
            <input type="text" name="test" placeholder="test">
        </div>
        <div>
            <input type="submit" value="Save a new product">
        </div>
    </form>
</body>

</html>
