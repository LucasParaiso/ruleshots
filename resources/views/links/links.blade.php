<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Fonts Link -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/b071ec038a.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/links.css') }}">

    <!-- title -->
    <title>Links</title>
</head>

<body>
    <div class="container">
        <div class="row row-cols-1 row-cols-5 h-100 d-flex align-items-center justify-content-center">
            @foreach ($links as $link)
            <form class="col" method="POST" action="{{ route('links.update') }}">
                @csrf
                <input type="text" value="{{ $link->id }}" name="id" hidden>
                <label class="custom-radio">
                    <input type="submit" @if ($link->is_active)
                    checked
                    @endif
                    />
                    <span class="radio-btn
                        @if ($link->is_active)
                        radio-btn-checked
                        @endif
                        ">
                        <div class=" hobbies-icon">
                            <i class="{{ $link->icon }}"></i>
                            <h3>{{ $link->name }}</h3>
                        </div>
                    </span>
                </label>
            </form>
            @endforeach
        </div>
    </div>

    @include('links/fab')
</body>

</html>