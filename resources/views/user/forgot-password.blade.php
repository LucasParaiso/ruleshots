@include('user.template.header')

<h1>Redefinir Senha</h1>

<!-- ERROR -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- SUCCESS -->
@if (session('message') !== null)
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="my-3">
    @csrf

    <!-- EMAIL -->
    <div class="textfield">
        <input type="email" name="email" placeholder="E-mail" required autofocus>
    </div>

    <!-- SUBMIT -->
    <button class="btn-login" type="submit">Enviar</button>
</form>

<!-- LOGIN -->
<a href="{{ route('login') }}">Já tem uma conta? Entre</a>

@include('user.template.footer')
