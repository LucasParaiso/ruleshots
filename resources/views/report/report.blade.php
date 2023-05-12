@include('template/header')

<div class="report">
    <div class="row row-cols-1 row-cols-md-4 justify-content-md-between">
        <h3 class="col-1" style="color: white;">Relatório</h3>
        <a href="{{ route('report.download') }}" class="col-1 reportButton">BAIXAR</a>
    </div>

    <div class="d-flex j-content-between table" style="margin-top: 40px">
        <table class="w-100">
            <tr class="firstBorderPurple">
                <td class="formatedFirstText" data-th="Heading 1">ID</td>
                <td class="formatedFirstText" data-th="Heading 2">Nome</td>
                <td class="formatedFirstText" data-th="Heading 3">Peso Garrafa Vazia</td>
                <td class="formatedFirstText" data-th="Heading 4">Peso Shot</td>
                <td class="formatedFirstText" data-th="Heading 5">Shots Restantes</td>
            </tr>

            @foreach ($drinks as $drink)
            <tr class="otherBorderPurple">
                <td class="formatedText">#{{ $drink->id }}</td>
                <td class="formatedText">{{ $drink->name }}</td>
                <td class="formatedText">{{ $drink->empty_bottle_weight }}</td>
                <td class="formatedText">{{ $drink->shot_weight }}</td>
                <td class="formatedText">{{ $drink->shot_remaining }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: var(--secondary)">
            <div class="modal-header" style="border-bottom: 0px">
                <h4 class="modal-title" style="color: white">
                    Download Iniciado!
                </h4>
            </div>

            <div class="modal-body">
                <p style="color: white">O download do seu relatorio começou e estará disponivel em instantes!</p>
            </div>

            <div class="modal-footer" style="border-top: 0px">
                <a data-bs-dismiss="modal" class="btn btn-light">Pronto</a>
            </div>
        </div>
    </div>
</div>

@include('template/footer')