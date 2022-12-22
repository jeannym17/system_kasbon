    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a href="index" class="logo">
                <span>
                    <img src="{{ URL::asset('assets/images/brand-logo/imst.png') }}" height="40" alt="logo" class="auth-logo">
                </span>
                <span>
               
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Main</li>
                <li>
                    <a href="{{ route('home') }}"> <i data-feather="home"
                            class="align-self-center menu-icon"></i><span>Dashboard</span></a>
                </li>

                <hr class="hr-dashed hr-menu">
                <li class="menu-label my-2">Components & Extra</li>
                @can('user')
                <li>
                    <a href="{{ route('users.index') }}"><i class="dripicons-user-group align-self-center menu-icon"></i><span>User</span></a>
                </li>
                @endcan
                @can('unit')
                <li>
                    <a href="{{ route('units.index') }}"><i class="dripicons-briefcase align-self-center menu-icon"></i><span>Unit</span></a>
                </li>
                @endcan
                @can('role')
                <li>
                    <a href="{{ route('roles.index') }}"><i class="dripicons-briefcase align-self-center menu-icon"></i><span>Role</span></a>
                </li>
                @endcan
                {{-- @can('kasbon')
                <li>
                    <a href="javascript: void(0);"> <i  class="align-self-center ti-receipt"></i><span>Kasbon</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('kasbon.index') }}"><i class="ti-control-record"></i>Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pertanggungan.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        @can('nonkasbon')
                        <li class="nav-item"><a class="nav-link" href="{{ route('nonkasbon.index') }}"><i class="ti-control-record"></i>Non Kasbon</a></li> 
                        @endcan
                    </ul>
                </li>
                @endcan --}}
                @can('kasbon')
                <li>
                    <a href="{{ route('kasbon.index') }}"> <i data-feather="file-text" class="align-self-center menu-icon"></i><span>Kasbon Rencana / Realisasi</span></a>
                </li>
                @endcan
                @can('pertanggungan')
                <li>
                    <a href="{{ route('pertanggungan.index') }}"> <i data-feather="file-text" class="align-self-center menu-icon"></i><span>Pertanggungan</span></a>
                </li>
                @endcan
                @can('nonkasbon')
                <li>
                    <a href="{{ route('nonkasbon.index') }}"> <i data-feather="file-text" class="align-self-center menu-icon"></i><span>Non Kasbon</span></a>
                </li>
                @endcan
                @can('atasan-user-1')
                <li>
                    <a href="javascript: void(0);"> <i  class="align-self-center menu-icon ti-check-box"></i><span>Atasan User 1</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb-atasan-user-1.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp-atasan-user-1.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk-atasan-user-1.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan

                @can('atasan-user-2')
                <li>
                    <a href="javascript: void(0);"> <i  class="align-self-center menu-icon ti-check-box"></i><span>Atasan User 2</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb-atasan-user-2.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp-atasan-user-2.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk-atasan-user-2.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan
               
                @can('atasan-user-3')
                <li>
                    <a href="javascript: void(0);"> <i  class="align-self-center menu-icon ti-check-box"></i><span>Atasan User 3</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb-atasan-user-3.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp-atasan-user-3.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk-atasan-user-3.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan

                @can('verifikator')
                <li>
                    <a href="javascript: void(0);"> <i class="align-self-center menu-icon ti-check-box"></i><span>Verifikator</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                <li>
                    <a href="javascript: void(0);"> <i class="align-self-center menu-icon ti-check-box"></i><span>Monitoring</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('mkb.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('mkp.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('mnk.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan
                
                @can('atasan-verifikator-1')
                <li>
                    <a href="javascript: void(0);"> <i class="align-self-center menu-icon ti-check-box" ></i><span>Atasan Verifikator 1</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb-atasan-verifikator-1.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp-atasan-verifikator-1.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk-atasan-verifikator-1.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan

                @can('atasan-verifikator-2')
                <li>
                    <a href="javascript: void(0);"> <i class="align-self-center menu-icon ti-check-box" ></i><span>Atasan Verifikator 2</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb-atasan-verifikator-2.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp-atasan-verifikator-2.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk-atasan-verifikator-2.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan
                @can('atasan-verifikator-3')
                <li>
                    <a href="javascript: void(0);"> <i class="align-self-center menu-icon ti-check-box" ></i><span>Atasan Verifikator 3</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkb-atasan-verifikator-3.index') }}"><i class="ti-control-record"></i>Kasbon Rencana / Realisasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vkp-atasan-verifikator-3.index') }}"><i class="ti-control-record"></i>Pertanggungan</a></li> 
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('vnk-atasan-verifikator-3.index') }}"><i class="ti-control-record"></i>NonKasbon</a></li>  --}}
                    </ul> 
                </li>
                @endcan
                @can('sppd')
                <li>
                    <a href="{{ route('sppd.index') }}"> <i data-feather="file-text" class="align-self-center menu-icon"></i><span>SPPD</span></a>
                </li>
                {{-- <li>
                    <a href="{{ route('msp.index') }}"> <i data-feather="file-text" class="align-self-center menu-icon"></i><span>Monitoring SP</span></a>
                </li> --}}
                @endcan
            </ul>
        </div>
    </div>
    
