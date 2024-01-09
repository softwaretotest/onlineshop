<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.metatag')
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.header')
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('message')
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>

</html>
