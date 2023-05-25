@include('user.template.header')

<p>Obrigado por se registrar! Verifique sua conta clicando no link que enviamos no e-mail.</p>

@if (session('status') == 'verification-link-sent')
    <p class="text-success">Um novo link de verificação foi enviado para o email fornecido durante o cadastro.</p>
@endif

<!-- Verification Email -->
<form method="POST" action="{{ route('verification.send') }}">
    @csrf

    <button class="btn-login" type="submit">Reenviar e-mail de verificação</button>
</form>


<!-- Log Out -->
<form method="POST" action="{{ route('logout') }}" id="formLogout">
    @csrf

    <a href="javascript:void(0)" onclick="document.getElementById('formLogout').submit()">Log Out</a>
</form>



@include('user.template.footer')
