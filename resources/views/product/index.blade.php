<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Index</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>test</th>
        </tr>
        <tr>
            @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->test }}</td>
            <td>
                <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
            </td>
            <td>
                <form action="{{ route('prodcomposer require laravel/breeze --devuct.delete', ['product' => $product]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>

            </td>

        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>
