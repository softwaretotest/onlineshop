<x-admin_layout>

    <div class="div_center">
        <h2 class="h2_font">Add Product Unit</h2>

        <form action="{{ url('/add_product_unit') }}" method="POST">
            @csrf {{-- without @csrf browser maybe does not post --}}
            <input type="text" class="input_color" name="product_unit" placeholder="Write product unit name">

            <input type="submit" class="btn btn-primary" name="submit" value="Add product unit">
        </form>

    </div>

    <table id="table_green" class="center width-50-percent">

        <tr>
            <th>Product Unit Name</th>
            <th>Action</th>
        </tr>

        @foreach ($product_unit as $product_unit)
            <tr>
                <td>{{ $product_unit->name }}</td>
                <td>
                    <a onclick="return confirm('Are you sure to delete this?')"
                        href="{{ url('delete_product_unit', $product_unit->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

    </table>

</x-admin_layout>
