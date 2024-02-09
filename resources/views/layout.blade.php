<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Shop</title>
    @yield('css')
</head>

<body>
    <div class="bg-body-tertiary">
        {{-- navbar --}}
        <nav class="container navbar nav-underline navbar-expand-lg bg-body-tertiary py-3">

            <a class="navbar-brand" href="#">Fakestore</a>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Cart</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dipendenti">Lista</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="d-flex flex-row">
                <button class="bg-black text-white btn">Login <span><i class="bi bi-person"></i></span></button>
            </div> --}}
        </nav>

        {{-- content --}}
        <div class="container">
            @yield('content')
        </div>

        {{-- footer --}}
        <footer class=" bg-body-tertiary text-center">
            <p>Copyright 2024</p>
        </footer>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#create_dipendente').submit(function(e) {
                e.preventDefault();
                // Serialize the form data
                const formData = new FormData(form);
                // Send an AJAX request
                $.ajax({
                    type: 'POST',
                    // url: '{!! route('create') !!}',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Handle the response message
                        // $('#cf-response-message').text(response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if needed
                        // console.error(xhr.responseText);
                    }
                });
            });
        });
    </script> --}}

    @yield('scripts')
</body>

</html>
