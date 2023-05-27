@include('template/header')

<div class="stock">
    <div class="row row-cols-1 row-cols-md-4 justify-content-md-between">
        <h3 class="col-1">Meu estoque</h3>
        <button class="col-1 reportButton" data-bs-toggle="modal" href="#myModal">ADICIONAR</button>
    </div>

    @if (session('message'))
    <div class="alert alert-{{ session('messageSucessDanger') }} text-center mt-3" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($drinks as $drink)
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="stock-img">
                    <div data-bs-toggle="modal" href="#myModal{{ $drink->id }}" style="cursor: pointer;">
                        <h4 style="color: var(--white);">{{ $drink->name }}</h4>
                        <img src="{{ asset('img/garrafa.png') }}" alt="Chop" style="max-width: 180px;" />
                    </div>
                    <div class="buttonDivStock">
                        <button class="btn eachButtonDivStock" data-bs-toggle="modal" href="#retirarShot{{ $drink->id }}">-</button>
                        <button class="btn eachButtonDivStock" data-bs-toggle="modal" href="#myModal{{ $drink->id }}">{{ $drink->shot_remaining }}</button>
                        <button class="btn eachButtonDivStock" data-bs-toggle="modal" href="#adicionarShot{{ $drink->id }}">+</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: var(--secondary);">
            <div class="modal-header" style="border-bottom: 0px;">
                <h2 class="modal-title" style="color:white;">Adicionar Garrafa</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            
            <div class="modal-body">
                <form method="POST" action="{{ route('stock.store') }}" id="formAddDrink">
                    @csrf
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="textfield">
                                <input type="text" name="name" placeholder="Nome" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="bottle_quantity" placeholder="Quantidade de Garrafas" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="total_bottle_weight" placeholder="Peso Total das Garrafas" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="empty_bottle_weight" placeholder="Peso de Uma Garrafa Vazia" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="shot_weight" placeholder="Peso do Shot Cheio" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="empty_shot_weight" placeholder="Peso do Shot Vazio" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 0px;">
                <a data-bs-dismiss="modal" class="btn btn-light">Cancelar</a>
                <button class="btn btn-dark" style="background-color: var(--primary);" type="submit" form="formAddDrink" value="Submit">Adicionar</button>
            </div>
        </div>
    </div>
</div>

@foreach ($drinks as $drink)
<div class="modal" id="myModal{{ $drink->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: var(--secondary);">
            <div class="modal-header" style="border-bottom: 0px;">
                <h2 class="modal-title" style="color:white;">Atualizar {{ $drink->name }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            
            <div class="modal-body">
                <form method="POST" action="{{ route('stock.update', ['stock' => $drink->id]) }}" id="formUpdateDrink{{ $drink->id }}">
                    @csrf
                    @method('put')
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="bottle_quantity" placeholder="Quantidade de Garrafas" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="textfield">
                                <input type="number" name="total_bottle_weight" placeholder="Peso Total das Garrafas" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer justify-content-between" style="border-top: 0px;">
                <div class="">
                    <form method="POST" action="{{ route('stock.destroy', ['stock' => $drink->id]) }}" id="formDeleteDrink{{ $drink->id }}">
                        @csrf
                        @method('delete')
                    </form>
                    <button class="btn btn-dark float-start" style="background-color: var(--primary); border-color: var(--primary);" type="submit" form="formDeleteDrink{{ $drink->id }}" value="Submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </div>
                <div class="">
                    <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-dark" style="background-color: var(--primary); border-color: var(--primary);" type="submit" form="formUpdateDrink{{ $drink->id }}" value="Submit">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="retirarShot{{ $drink->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: var(--secondary);">
            <div class="modal-header" style="border-bottom: 0px;">
                <h2 class="modal-title" style="color:white;">Retirar Shots de {{ $drink->name }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('stock.updateShot', ['stock' => $drink->id]) }}" id="formRetirarShot{{ $drink->id }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col">
                            <div class="textfield">
                                <input type="text" name="operacao" value="retirar" hidden>
                                <input type="number" name="value" placeholder="Quantidade de Shots" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer" style="border-top: 0px;">
                <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-dark" style="background-color: var(--primary); border-color: var(--primary);" type="submit" form="formRetirarShot{{ $drink->id }}" value="Submit">Retirar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="adicionarShot{{ $drink->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: var(--secondary);">
            <div class="modal-header" style="border-bottom: 0px;">
                <h2 class="modal-title" style="color:white;">Adicionar Shots de {{ $drink->name }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('stock.updateShot', ['stock' => $drink->id]) }}" id="formAdicionarShot{{ $drink->id }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col">
                            <div class="textfield">
                                <input type="text" name="operacao" value="adicionar" hidden>
                                <input type="number" name="value" placeholder="Quantidade de Shots" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer" style="border-top: 0px;">
                <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-dark" style="background-color: var(--primary); border-color: var(--primary);" type="submit" form="formAdicionarShot{{ $drink->id }}" value="Submit">Retirar</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@include('template/footer')
