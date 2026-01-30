<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
        <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"><i class="bi bi-house-door-fill me-1"></i> Home</a></li>
        @if (Request::is('/'))
            <li class="dropdown"><a href="#"
                                    class="{{ request()->is('/') && (str_contains(url()->current(), '#tools') || str_contains(url()->current(), '#team')) ? 'active' : '' }}"><span><i
                            class="bi bi-info-circle-fill me-1"></i> About</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a class="nav-link {{ str_contains(url()->current(), '#tools') ? 'active' : '' }}" href="#tools"><i class="bi bi-tools me-1"></i> Tools</a></li>
                    <li><a class="nav-link {{ str_contains(url()->current(), '#team') ? 'active' : '' }}" href="#team"><i class="bi bi-people-fill me-1"></i> Team</a></li>
                </ul>
        @else
        @endif
        <li><a class="nav-link {{ request()->routeIs('data*') ? 'active' : '' }}" href="{{ route('data') }}"><i class="bi bi-table me-1"></i> Data</a></li>
        <li><a class="nav-link {{ request()->routeIs('map') ? 'active' : '' }}" href="{{ route('map') }}"><i class="bi bi-map-fill me-1"></i> Map</a></li>
        <li><a class="nav-link" href="https://blog.digitizedmedievalmanuscripts.org/" target="_blank" rel="noopener noreferrer"><i class="bi bi-rss-fill me-1"></i> Blog <sup><i
                        class="bi bi-box-arrow-up-right small"></i></sup></a></li>
        <li><a class="nav-link {{ request()->routeIs('contact.show') ? 'active' : '' }}" href="{{ route('contact.show') }}"><i class="bi bi-envelope-fill me-1"></i> Contact</a></li>
        <li><a class="nav-link"
               href="https://github.com/SexyCodicology/DMMapp-Digitized-Medieval-Manuscripts-app"
               target="_blank" rel="noopener noreferrer"><i class="bi bi-github me-1"></i> GitHub <sup><i
                        class="bi bi-box-arrow-up-right small"></i></sup></a></li>
        @auth
            <li class="dropdown"><a href="#" class="{{ (request()->routeIs('admin') || request()->routeIs('create_library') || request()->routeIs('broken-links') || request()->is('admin/jobs') || request()->is('admin/log-viewer')) ? 'active' : '' }}"><span><i class="bi bi-person-fill-gear me-1"></i> Admin</span> <i
                        class="bi bi-chevron-down"></i></a>
                <ul>
                    <li>
                        <a href="{{ route('admin') }}" class="{{ request()->routeIs('admin') ? 'active' : '' }}"><i class="bi bi-buildings-fill me-1"></i> Manage institutions</a>
                    </li>
                    <li><a class="nav-link {{ request()->routeIs('create_library') ? 'active' : '' }}" href="{{ route('create_library') }}"><i class="bi bi-building-fill-add me-1"></i> Add institution</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="nav-link {{ request()->routeIs('broken-links') ? 'active' : '' }}" href="{{ route('broken-links') }}"><i class="bi bi-link-45deg me-1"></i> Manage broken links</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="nav-link {{ request()->is('admin/jobs') ? 'active' : '' }}" href="/admin/jobs" target="_blank" rel="noopener noreferrer"><i class="bi bi-list-task me-1"></i> Jobs
                            monitor</a>
                    </li>
                    <li><a class="nav-link {{ request()->is('admin/log-viewer') ? 'active' : '' }}" href="/admin/log-viewer" rel="noopener noreferrer"><i class="bi bi-file-earmark-text-fill me-1"></i> Logs
                            monitor</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        @endauth
        <li class="ml-4"></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle mx-3" aria-controls="navbar" aria-expanded="false" role="button" tabindex="0"></i>
</nav><!-- .navbar -->
