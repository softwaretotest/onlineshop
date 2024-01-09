@if (session()->has('message'))
    <div class="alert alert-success div_center">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h2>
            {{ session()->get('message') }}
        </h2>

    </div>
@endif
