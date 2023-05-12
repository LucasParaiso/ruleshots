@include('template/header')

<div class="config">
    <div class="d-flex j-content-between mb-4">
        <h3 style="color: white; margin:0px">Configurações</h3><br>
    </div>

    @if (session('message'))
    <div class="alert alert-{{ session('messageSucessDanger') }} text-center" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="configMainDropdownItens">
        <p class="configDropdownItens">Meu Perfil</p>
        <div class="container">
            <form class="row row-cols-1 row-cols-md-2" method="post" action="{{ route('user.update', ['user' => $user->id]) }}" id="formConfig">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="textfield">
                        <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}" required>
                    </div>
                </div>

                <div class="col">
                    <div class="textfield">
                        <input type="text" name="adress" placeholder="Endereço" value="{{ $user->adress }}">
                    </div>
                </div>

                <div class="col">
                    <div class="textfield">
                        <input type="email" name="email" placeholder="E-mail" value="{{ $user->email }}" required>
                    </div>
                </div>

                <div class="col">
                    <div class="textfield">
                        <input type="tel" name="phone" placeholder="Telefone" value="{{ $user->phone }}">
                    </div>
                </div>

                <div class="col">
                    <div class="textfield">
                        <input type="text" name="social_media_1" placeholder="Rede Social 1" value="{{ $user->social_media_1 }}">
                    </div>
                </div>

                <div class="col">
                    <div class="textfield">
                        <input type="text" name="social_media_2" placeholder="Rede Social 2" value="{{ $user->social_media_2 }}">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <button class="col-4 reportButton mt-4" type="submit" form="formConfig" value="Submit">SALVAR</button>
    </div>
</div>

@include('template/footer')