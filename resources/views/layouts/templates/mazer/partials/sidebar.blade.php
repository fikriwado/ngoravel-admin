<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('templates/mazer/assets/compiled/svg/logo.svg') }}"
                            alt="Logo" srcset="" /></a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @foreach (config('menus.admin') as $menu)
                    @canany(collect($menu['items'])->pluck('permission')->toArray())
                        <li class="sidebar-title">{{ $menu['name'] }}</li>
                    @endcanany

                    @foreach ($menu['items'] as $item)
                        @can($item['permission'])
                            <li
                                class="sidebar-item {{ isset($item['submenu']) && count($item['submenu']) > 0 ? 'has-sub' : '' }}">
                                <a href="{{ route($item['route']) }}" class="sidebar-link">
                                    <i class="bi {{ $item['icon'] }}"></i>
                                    <span>{{ $item['name'] }}</span>
                                </a>

                                @if (isset($item['submenu']) && count($item['submenu']) > 0)
                                    <ul class="submenu">
                                        @foreach ($item['submenu'] as $submenu)
                                            @can($submenu['permission'])
                                                <li class="submenu-item">
                                                    <a href="{{ route($submenu['route']) }}"
                                                        class="submenu-link">{{ $submenu['name'] }}</a>
                                                </li>
                                            @endcan
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endcan
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>
