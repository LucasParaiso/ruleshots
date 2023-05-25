<div class="sidebar">
    <div class="logo-details">
        <div class="user_name">{{ session('name') }}</div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list" style="padding-left: 0px">
        <li>
            <a href="{{ route('stock.index') }}">
                <i class="bx bx-folder"></i>
                <span class="links_name">Estoque</span>
            </a>
            <span class="tooltip">Estoque</span>
        </li>
        <li>
            <a href="{{ route('report.index') }}">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="links_name">Relatório</span>
            </a>
            <span class="tooltip">Relatório</span>
        </li>
        <li>
            <a href="">
                <i class="bx bx-cog"></i>
                <span class="links_name">Configurações</span>
            </a>
            <span class="tooltip">Configurações</span>
        </li>
        <li class="profile">
            <form id="formLogout" action="{{ route('logout') }}" method="POST">@csrf</form>
            <a href="javascript:void(0)" onclick="document.getElementById('formLogout').submit()">
                <i class="bx bx-log-out"></i>
                <span class="links_name">Deslogar</span>
            </a>
            <span class="tooltip">Deslogar</span>
        </li>
    </ul>
</div>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
</script>
