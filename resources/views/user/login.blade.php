<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/shots.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Rule Shots</title>
</head>

<body>
    <div class="main-login">
        <div class="left-login">
            <img src="{{ asset('img/beer.gif') }}" alt="Chop">
        </div>
        <div class="right-login">
            <div class="card-login" style="margin-bottom: 20px">
                <h1>LOGIN</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('auth.user') }}">
                    @csrf
                    @if (session('message') !== null)
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="textfield">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="textfield">
                        <label for="password">Senha</label>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                    <button class="btn-login" type="submit">Entrar</button>
                </form>
                <a href="{{ route('register.create') }}">Não tem uma conta? Registre-se</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>