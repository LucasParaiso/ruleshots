<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

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

                <form method="post" action="{{ route('login') }}">
                    @csrf

                    @if (session('message') !== null)
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif


                    <!-- Email Address -->
                    <div class="textfield">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" required autofocus autocomplete="username">
                    </div>


                    <!-- Password -->
                    <div class="textfield">
                        <label for="password">Senha</label>
                        <input type="password" name="password" placeholder="Senha" required autocomplete="current-password">
                    </div>

                    <button class="btn-login" type="submit">Entrar</button>
                </form>

                <a href="{{ route('register.create') }}">Não tem uma conta? Registre-se</a>
            </div>
        </div>
    </div>
</x-guest-layout>
