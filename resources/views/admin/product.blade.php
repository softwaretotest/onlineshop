<x-admin_layout>
    <div class="div_center">

        <h2 class="h2_font">Add Product</h2>

        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="div_design">
                <label>Product Name :</label>
                <input class="input_color" type="text" name="name" required=""
                    placeholder="Write a name of product">
            </div>

            <div class="div_design">
                <label>Product Descripton :</label>
                <input class="input_color" type="text" name="description" required=""
                    placeholder="Write a description">
            </div>

            <div class="div_design">
                <label>Product Price :</label>
                <input class="input_color" type="number" step="any" name="price" required=""
                    placeholder="Write a price">
            </div>

            <div class="div_design">
                <label>Discount Price :</label>
                <input class="input_color" type="number" step="any" name="discount_price"
                    placeholder="Write a discount price">
            </div>

            <div class="div_design">
                <label>Product Quantity :</label>
                <input class="input_color" type="number" name="quantity" min="0" required=""
                    placeholder="Write a quantity">
            </div>

            <div class="div_design">
                <label>Product Quantity Unit :</label>
                <select class="input_color" name="product_unit">
                    <option value="" selected="">Select a unit here</option>
                    @foreach ($product_unit as $product_unit)
                        <option value="{{ $product_unit->id }}">{{ $product_unit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="div_design">
                <label>Product Catagory :</label>
                <select class="input_color" name="catagory">
                    <option value="" selected="">Select a catagory here</option>
                    @foreach ($catagory as $catagory)
                        <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="div_design">
                <label>Product Image :</label>
                <input type="file" name="image" required="">
            </div>

            <div class="div_design">
                <input type="submit" value="Add Product" class="btn btn-primary">
            </div>

        </form>

    </div>
</x-admin_layout>
