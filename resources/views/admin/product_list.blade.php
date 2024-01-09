<x-admin_layout>

    <div class="div_center">
        <h2 class="h2_font">Product List</h2>
    </div>

    <table id="table_green" class="center width-100-percent">

        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Catagory</th>
            <th>Price</th>
            <th>Discount Price</th>
            <th>Product Image</th>
            <th>Action</th>
        </tr>

        @foreach ($product as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->catagory }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount_price }}</td>
                <td>
                    <img src="/product/{{ $product->image }}">
                </td>
                <td>
                    <a href="{{ url('edit_product', $product->id) }}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure to delete this?')"
                        href="{{ url('delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

    </table>

</x-admin_layout>
