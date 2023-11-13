<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- Administrator --}}
                @can('admin')
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Administration
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('usuarios.index')}}">Users</a>
                            <a class="nav-link" href="{{route('roles.index')}}">Rol</a>
                            <a class="nav-link" href="{{route('permissions.index')}}">Permissions</a>

                        </nav>
                    </div>
                @endcan
                {{-- Forms --}}
                @can('button-forms')
                    <div class="sb-sidenav-menu-heading">FORMULARIOS</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Formularios
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('create-form-modality')
                                <a class="nav-link" href="{{route('formulario_modalidad.create')}}">Modalidades de Graduación</a>
                            @endcan
                        </nav>
                    </div>
                @endcan
                {{-- Reports --}}
                @can('button-reports')
                    <div class="sb-sidenav-menu-heading">REPORTES</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReporte" aria-expanded="false" aria-controls="collapseReporte">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Reportes
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseReporte" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('report-form-modality')
                                <a class="nav-link" href="{{route('Por.Gestion')}}">Por Gestion</a>
                            @endcan
                        </nav>
                    </div>
                @endcan
                {{-- CRUD's --}}
                @can('button-cruds')
                    <div class="sb-sidenav-menu-heading">C.R.U.D.</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCRUD" aria-expanded="false" aria-controls="collapseCRUD">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        CRUD's
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCRUD" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('crud-index-teacher')
                                <a class="nav-link" href="{{route('docentes.index')}}">Docentes</a>
                            @endcan
                            @can('crud-index-career')
                                <a class="nav-link" href="{{route('carreras.index')}}">Carreras</a>
                            @endcan
                            @can('crud-index-modalities')
                                <a class="nav-link" href="{{route('tipos_modalidad.index')}}">Modalidades</a>
                            @endcan
                        </nav>
                    </div>
                @endcan
                {{-- Tables --}}
                @can('button-tables')
                    <div class="sb-sidenav-menu-heading">TABLAS</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTable" aria-expanded="false" aria-controls="collapseTable">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Tablas
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseTable" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                        @can('form-index-modality')
                            <a class="nav-link" href="{{route('formulario_modalidad.index')}}">Modalidad de Graduación</a>
                        @endcan
                        </nav>
                    </div>
                @endcan
            </div>
        </div>
    </nav>
</div>
