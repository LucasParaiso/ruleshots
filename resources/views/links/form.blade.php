<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Fonts Link -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap" rel="stylesheet" />

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/b071ec038a.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/links.css') }}">

    <!-- title -->
    <title>Links</title>
</head>

<body>
    <div class="main-container">
        <form class="p-4" id="inputs" method="POST" action="{{ route('links.store') }}">
            @csrf
            @if (session('message'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session('message') }}
            </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control" name="link" id="link" required>
            </div>

            <div class="mb-5">
                <label for="icon" class="form-label">Icon</label>
                <input type="text" class="form-control" name="icon" id="icon">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    
    @include('links/fab')
</body>

</html>