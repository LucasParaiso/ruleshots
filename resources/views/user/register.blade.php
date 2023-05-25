@include('user.template.header')

<h1>REGISTRAR</h1>

<form method="POST" action="{{ route('register') }}" class="my-3">
    @csrf

    <!-- NAME -->
    <div class="textfield">
        <input type="name" name="name" placeholder="Nome">
    </div>

    <!-- EMAIL -->
    <div class="textfield">
        <input type="email" name="email" placeholder="E-mail">
    </div>

    <!-- PASSWORD -->
    <div class="textfield">
        <input type="password" name="password" placeholder="Senha">
    </div>

    <!-- PASSWORD CONFIRMATION -->
    <div class="textfield">
        <input type="password" name="password_confirmation" placeholder="Confirmar Senha">
    </div>

    <button class="btn-login my-3">Registrar</button>
</form>

<!-- LOGIN -->
<a href="{{ route('login') }}">Já tem uma conta? Entre</a>

@include('user.template.footer')
