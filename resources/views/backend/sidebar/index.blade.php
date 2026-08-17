<nav class="navbar mai-sub-header">
    <div class="container">
        <!-- Mega Menu structure-->
        <nav class="navbar navbar-toggleable-sm">
            <button type="button" data-toggle="collapse" data-target="#mai-navbar-collapse"
                    aria-controls="#mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler hidden-md-up collapsed">
                <div class="icon-bar"><span></span> <span></span> <span></span>
                </div>
            </button>
            <div id="mai-navbar-collapse" class="navbar-collapse collapse mai-nav-tabs">
                <ul class="nav navbar-nav">
                    <li class="nav-item parent open">
                        <a href="#" role="button" aria-expanded="false"
                           class="nav-link"> <span class="icon s7-home"></span> <span>Home</span>
                        </a>

                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">

                            {{--
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/index.php"
                                        class="nav-link active"> <span class="icon s7-monitor"></span> <span
                                            class="name">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span class="name">UI Elements</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a
                                            href="http://foxythemes.net/preview/products/maisonnette/ui-general.php"
                                            class="dropdown-item">General</a>
                                    <a
                                            href="http://foxythemes.net/preview/products/maisonnette/ui-panels.php"
                                            class="dropdown-item">Panels</a>
                                    <a
                                            href="http://foxythemes.net/preview/products/maisonnette/ui-buttons.php"
                                            class="dropdown-item">Buttons</a>
                                    <a
                                            href="http://foxythemes.net/preview/products/maisonnette/ui-typography.php"
                                            class="dropdown-item">Typography</a>
                                    <a
                                            href="http://foxythemes.net/preview/products/maisonnette/ui-grid.php"
                                            class="dropdown-item">Grid</a>
                                </div>
                            </li>
                            --}}
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('stud.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('stud.index') !!}"
                                       class="dropdown-item">{{trans('stud.menu.index')}}</a>
                                    <a href="{!! route('stud.create') !!}"
                                       class="dropdown-item">{{trans('stud.menu.create')}}</a>
                                    <a href="{!! route('stud.edit') !!}"
                                       class="dropdown-item">{{trans('stud.menu.edit')}}</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('horse.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('horse.index') !!}"
                                       class="dropdown-item">{{trans('horse.menu.index')}}</a>
                                    <a href="{!! route('horse.create') !!}"
                                       class="dropdown-item">{{trans('horse.menu.create')}}</a>
                                    {{--<a href="{!! route('horse.edit') !!}" class="dropdown-item">{{trans('horse.menu.edit')}}</a>--}}

                                </div>
                            </li>
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('photo.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('photo.index') !!}"
                                       class="dropdown-item">{{trans('photo.menu.index')}}</a>
                                    <a href="{!! route('photo.create') !!}"
                                       class="dropdown-item">{{trans('photo.menu.create')}}</a>
                                    <a href="{!! route('photo.edit') !!}"
                                       class="dropdown-item">{{trans('photo.menu.edit')}}</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('video.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('video.index') !!}"
                                       class="dropdown-item">{{trans('video.menu.index')}}</a>
                                    <a href="{!! route('video.create') !!}"
                                       class="dropdown-item">{{trans('video.menu.create')}}</a>
                                    <a href="{!! route('video.edit') !!}"
                                       class="dropdown-item">{{trans('video.menu.edit')}}</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('country.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('country.index') !!}"
                                       class="dropdown-item">{{trans('country.menu.index')}}</a>
                                    <a href="{!! route('country.create') !!}"
                                       class="dropdown-item">{{trans('country.menu.create')}}</a>
                                    <a href="{!! route('country.edit') !!}"
                                       class="dropdown-item">{{trans('country.menu.edit')}}</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('state.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('state.index') !!}"
                                       class="dropdown-item">{{trans('state.menu.index')}}</a>
                                    <a href="{!! route('state.create') !!}"
                                       class="dropdown-item">{{trans('state.menu.create')}}</a>
                                    <a href="{!! route('state.edit') !!}"
                                       class="dropdown-item">{{trans('state.menu.edit')}}</a>

                                </div>
                            </li>

                            <li class="nav-item dropdown parent">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                        data-toggle="dropdown" class="nav-link">
                                        <span
                                                class="icon s7-diamond"></span> <span
                                            class="name">{{trans('city.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('city.index') !!}"
                                       class="dropdown-item">{{trans('city.menu.index')}}</a>
                                    <a href="{!! route('city.create') !!}"
                                       class="dropdown-item">{{trans('city.menu.create')}}</a>
                                    <a href="{!! route('city.edit') !!}"
                                       class="dropdown-item">{{trans('city.menu.edit')}}</a>

                                </div>
                            </li>

                            <li class="nav-item dropdown parent">
                                <a href="http://foxythemes.net/preview/products/maisonnette/ui-elements.php"
                                   data-toggle="dropdown" class="nav-link">
                                    <span class="icon s7-diamond"></span> <span
                                            class="name">{{trans('users.menu.caption')}}</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{!! route('user.index') !!}"
                                       class="dropdown-item">{{trans('users.menu.index')}}</a>
                                    <a href="{!! route('user.create') !!}"
                                       class="dropdown-item">{{trans('users.menu.create')}}</a>
                                    {{-- <a href="{!! route('user.edit') !!}" class="dropdown-item">{{trans('users.menu.edit')}}</a> --}}

                                </div>
                            </li>
                        </ul>
                    </li>
                    {{--
                    <li class="nav-item parent">
                        <a href="#" role="button" aria-expanded="false"
                           class="nav-link"> <span class="icon s7-rocket"></span> <span>Forms</span>
                        </a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-elements.php"
                                        class="nav-link"> <span class="name">Elements</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-validation.php"
                                        class="nav-link"> <span class="name">Validation</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-masks.php"
                                        class="nav-link"> <span class="name">Masks</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-xeditable.php"
                                        class="nav-link"> <span class="name">X-Editable</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-multiselect.php"
                                        class="nav-link"> <span class="name">Multiselect</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-wizard.php"
                                        class="nav-link"> <span class="name">Wizard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                        href="http://foxythemes.net/preview/products/maisonnette/form-upload.php"
                                        class="nav-link"> <span class="name">Upload</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    --}}
                </ul>
            </div>
        </nav>
        <!--Search input-->
        <div class="search">
            <input placeholder="Search..." name="q" type="text"> <span class="s7-search"></span>
        </div>
    </div>
</nav>
    
