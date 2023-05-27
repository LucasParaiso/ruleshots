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
            <a href="{{ route('user.show', ['user' => session('id')]) }}">
                <i class="bx bx-cog"></i>
                <span class="links_name">Configurações</span>
            </a>
            <span class="tooltip">Configurações</span>
        </li>
        <li>
            <a style="cursor: pointer">
                <i class="bx bx-cog"></i>
                <span class="links_name" id="toggle-button" onclick="darkwhitemode()" >Alternar Modo</span>
            </a>
            <span class="tooltip">Alternar Modo</span>
        </li>
        <li class="profile">
            <form id="formLogout" action="{{ route('auth.logout') }}" method="POST">@csrf</form>
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

    function setDarkModePreference(isDarkMode) {
      localStorage.setItem('darkModePreference', isDarkMode);
    }

    function setDarkModePreference(isDarkMode) {
      localStorage.setItem('darkModePreference', isDarkMode);
    }

    function darkwhitemode() {
      const toggleButton = document.getElementById('toggle-button');

      const darkModePreference = localStorage.getItem('darkModePreference');
      const isDarkMode = darkModePreference === 'true';

      document.documentElement.classList.toggle('dark-mode', isDarkMode);

      toggleButton.addEventListener('click', function () {
        const newIsDarkMode = !isDarkMode;

        document.documentElement.classList.toggle('dark-mode', newIsDarkMode);
        setDarkModePreference(newIsDarkMode);
      });
    }

    document.addEventListener('DOMContentLoaded', function () {
      darkwhitemode();
    });

</script>
