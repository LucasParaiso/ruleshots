@include('user.template.header')

<h1>Nova Senha</h1>

<!-- ERROR -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center mt-3" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

<!-- SUCCESS -->
@if (session('message') !== null)
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('password.store') }}" class="my-3">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">


    <!-- EMAIL -->
    <div class="textfield">
        <input type="email" name="email" placeholder="E-mail" value="{{ $request->email }}" required autofocus>
    </div>

    <!-- Password -->
    <div class="textfield">
        <input type="password" name="password" placeholder="Senha" required autocomplete="new-password">
    </div>

    <!-- Confirm Password -->
    <div class="textfield">
        <input type="password" name="password_confirmation" placeholder="Senha" required autocomplete="new-password">
    </div>

    <!-- SUBMIT -->
    <button class="btn-login" type="submit">Enviar</button>
</form>

@include('user.template.footer')
