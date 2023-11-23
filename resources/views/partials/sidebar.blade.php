<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./index.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">App Menu</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#group" aria-expanded="false" aria-controls="group">
                <i class="menu-icon mdi mdi-group"></i>
                <span class="menu-title">Groups</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="group">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::tokenRoute('group.index') }}">All Group</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ URL::tokenRoute('t') }}">Create</a></li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item"> <a class="nav-link" href="{{ URL::tokenRoute('shop') }}">Shop</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ URL::tokenRoute('shop.redirect') }}">Redirect</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ URL::tokenRoute('shop.submission') }}">Submission</a></li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
                <i class="menu-icon mdi mdi-frequently-asked-questions"></i>
                <span class="menu-title">FAQ</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="faq">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="./pages/ui-features/buttons.html">All FAQ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="./pages/ui-features/dropdowns.html">Create</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
