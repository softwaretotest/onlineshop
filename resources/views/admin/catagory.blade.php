<x-admin_layout>

    <div class="div_center">
        <h2 class="h2_font">Add Catagory</h2>

        <form action="{{ url('/add_catagory') }}" method="POST">
            @csrf {{-- without @csrf browser maybe does not post --}}
            <input type="text" class="input_color" name="catagory" placeholder="Write catagory name">

            <input type="submit" class="btn btn-primary" name="submit" value="Add catagory">
        </form>

    </div>

    <table id="table_green" class="center width-50-percent">

        <tr>
            <th>Catagory Name</th>
            <th>Action</th>
        </tr>

        @foreach ($catagory as $catagory)
            <tr>
                <td>{{ $catagory->name }}</td>
                <td>
                    <a onclick="return confirm('Are you sure to delete this?')"
                        href="{{ url('delete_catagory', $catagory->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

    </table>

</x-admin_layout>
