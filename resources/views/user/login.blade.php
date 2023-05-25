@include('user.template.header')

<h1>LOGIN</h1>

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

<form method="post" action="{{ route('login') }}" class="my-3">
    @csrf

    <!-- SUCCESS -->
    @if (session('message') !== null)
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- EMAIL -->
    <div class="textfield">
        <input type="email" name="email" placeholder="E-mail">
    </div>

    <!-- PASSWORD -->
    <div class="textfield">
        <input type="password" name="password" placeholder="Senha">
    </div>

    <!-- SUBMIT -->
    <button class="btn-login" type="submit">Entrar</button>
</form>

<!-- REGISTER -->
<a href="{{ route('register') }}" class="my-2">Não tem uma conta? Registre-se</a>

{{-- FORGOT PASSWORD --}}
<a href="{{ route('password.request') }}">Esqueceu sua Senha?</a>

@include('user.template.footer')
