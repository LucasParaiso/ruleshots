<div class="fab-container">
    <div class="fab fab-icon-holder">
        <i class="fas fa-bars"></i>
    </div>

    <ul class="fab-options">
        <li>
            <span class="fab-label">Icons</span>
            <div class="fab-icon-holder">
                <a href="https://fontawesome.com/search?o=r&m=free" target="_blank"><i class="fas fa-magnifying-glass"></i></a>
            </div>
        </li>

        <li>
            <span class="fab-label">Links</span>
            <div class="fab-icon-holder">
                <a href="{{ route('links.list') }}"><i class="fas fa-link"></i></a>
            </div>
        </li>

        <li>
            <span class="fab-label">Novo Link</span>
            <div class="fab-icon-holder">
                <a href="{{ route('links.form') }}"><i class="fas fa-plus"></i></a>
            </div>
        </li>
    </ul>
</div>