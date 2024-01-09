<x-admin_layout>
    <div class="div_center">
        <h2 class="h2_font">Edit Product</h2>

        <form action="{{ url('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="grid-container">
                <div class="grid-child">
                    <div class="div_design">
                        <label>Product Name :</label>
                        <input class="input_color" type="text" name="name" required=""
                            placeholder="Write a title" value="{{ $product->name }}">
                    </div>

                    <div class="div_design">
                        <label>Product Descripton :</label>
                        <input class="input_color" type="text" name="description" required=""
                            placeholder="Write a description" value="{{ $product->description }}">
                    </div>

                    <div class="div_design">
                        <label>Product Price :</label>
                        <input class="input_color" type="number" step="any" name="price" required=""
                            placeholder="Write a price" value="{{ $product->price }}">
                    </div>

                    <div class="div_design">
                        <label>Discount Price :</label>
                        <input class="input_color" type="number" step="any" name="discount_price"
                            placeholder="Write a discount price" value="{{ $product->discount_price }}">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity :</label>
                        <input class="input_color" type="number" name="quantity" min="0" required=""
                            placeholder="Write a quantity" value="{{ $product->quantity }}">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity Unit :</label>
                        <select class="input_color" name="product_unit">
                            @foreach ($product_unit as $pu)
                                @if ($product->unit == $pu->id)
                                    <option value="{{ $pu->id }}" selected>{{ $pu->name }} </option>
                                @else
                                    <option value="{{ $pu->id }}">{{ $pu->name }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label>Product Catagory :</label>
                        <select class="input_color" name="catagory">
                            @foreach ($catagory as $c)
                                @if ($product->catagory == $c->id)
                                    <option value="{{ $c->id }}" selected>{{ $c->name }} </option>
                                @else
                                    <option value="{{ $c->id }}">{{ $c->name }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label>Change Product Image :</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>
                </div>
                <div class="grid-child">
                    <div class="div_design">
                        <label>Current Product Image :</label>
                    </div>
                    <div class="div_design">
                        <img src="/product/{{ $product->image }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin_layout>
