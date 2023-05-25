<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="@if(Request::is('/*')) mm-active @endif">
                    <a href="#">
                        <i class="metismenu-icon fa fa-home" aria-hidden="true"></i></i>Dashboards
                    </a>
                </li>
                <li class="app-sidebar__heading">Master Data</li>
                <li class="@if(Request::is('jenispemeriksaan*')) mm-active @endif">
                    <a href="/jenispemeriksaan">
                        <i class="fa fa-stethoscope metismenu-icon" aria-hidden="true"></i>Jenis Pemeriksaan
                    </a>

                </li>
                <li class="@if(Request::is('ob*')) mm-active @endif">
                    <a href="#">
                        <i class="metismenu-icon fa fa-archive" aria-hidden="true"></i> Obat & Alkes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{url('obsupplier')}}">
                                <i class="metismenu-icon"> </i> Supplier
                            </a>
                        </li>
                        <li>
                            <a href="obat">
                                <i class="metismenu-icon"></i> Obat
                            </a>
                        </li>
                        <li>
                            <a href="obalkes">
                                <i class="metismenu-icon"></i>Alkes
                            </a>
                        </li>
                        <li>
                            <a href="obpembelian">
                                <i class="metismenu-icon"></i>Pembelian
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if(Request::is('pasien') || Request::is('inputTindakan*')) mm-active @endif">
                    <a href="#">
                        <i class="metismenu-icon fa fa-id-card" aria-hidden="true"></i></i> Pasien
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

                    </a>
                    <ul>
                        <li>
                            <a href="{{url('pasien')}}">
                                <i class="metismenu-icon"> </i> Pasien
                            </a>
                        </li>
                        <li>
                            <a href="{{url('inputTindakan')}}">
                                <i class="metismenu-icon"></i> Input Tindakan
                            </a>
                        </li>
                        <li>
                            <a href="obalkes">
                                <i class="metismenu-icon"></i>Alkes
                            </a>
                        </li>
                        <li>
                            <a href="obpembelian">
                                <i class="metismenu-icon"></i>Pembelian
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if(Request::is('dokter')) mm-active @endif">
                    <a href="#">
                        <i class="metismenu-icon fa fa-id-card" aria-hidden="true"></i></i>Dokter
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

                    </a>
                    <ul>
                        <li>
                            <a href="{{url('dokter')}}">
                                <i class="metismenu-icon"> </i> Dokter
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="metismenu-icon"></i> Sip Kerja
                            </a>
                        </li>
                        <li>
                            <a href="obalkes">
                                <i class="metismenu-icon"></i>Waktu Kerja
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Pengaturan</li>

                <li class="@if(Request::is('users')) mm-active @endif">
                    <a href="#">
                        <i class="metismenu-icon fa fa-users" aria-hidden="true"></i> Users
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-car"></i> Components
                    </a>
                </li>
                <li>


                    <a href="widgets-chart-boxes.html">
                        <i class="metismenu-icon pe-7s-graph"></i>Chart Boxes 1
                    </a>
                </li>
                <li>
                    <a href="widgets-chart-boxes-2.html">
                        <i class="metismenu-icon pe-7s-way"></i>Chart Boxes 2
                    </a>
                </li>
                <li>
                    <a href="widgets-chart-boxes-3.html">
                        <i class="metismenu-icon pe-7s-ball"></i>Chart Boxes 3
                    </a>
                </li>
                <li>
                    <a href="widgets-profile-boxes.html">
                        <i class="metismenu-icon pe-7s-id"></i>Profile Boxes
                    </a>
                </li>
                <li class="app-sidebar__heading">Forms</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-light"></i> Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="forms-controls.html">
                                <i class="metismenu-icon"></i>Controls
                            </a>
                        </li>
                        <li>
                            <a href="forms-layouts.html">
                                <i class="metismenu-icon"></i>Layouts
                            </a>
                        </li>
                        <li>
                            <a href="forms-validation.html">
                                <i class="metismenu-icon"></i>Validation
                            </a>
                        </li>
                        <li>
                            <a href="forms-wizard.html">
                                <i class="metismenu-icon"></i>Wizard
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-joy"></i> Widgets
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="forms-datepicker.html">
                                <i class="metismenu-icon"></i>Datepicker
                            </a>
                        </li>
                        <li>
                            <a href="forms-range-slider.html">
                                <i class="metismenu-icon"></i>Range Slider
                            </a>
                        </li>
                        <li>
                            <a href="forms-input-selects.html">
                                <i class="metismenu-icon"></i>Input Selects
                            </a>
                        </li>
                        <li>
                            <a href="forms-toggle-switch.html">
                                <i class="metismenu-icon"></i>Toggle Switch
                            </a>
                        </li>
                        <li>
                            <a href="forms-wysiwyg-editor.html">
                                <i class="metismenu-icon"></i>WYSIWYG Editor
                            </a>
                        </li>
                        <li>
                            <a href="forms-input-mask.html">
                                <i class="metismenu-icon"></i>Input Mask
                            </a>
                        </li>
                        <li>
                            <a href="forms-clipboard.html">
                                <i class="metismenu-icon"></i>Clipboard
                            </a>
                        </li>
                        <li>
                            <a href="forms-textarea-autosize.html">
                                <i class="metismenu-icon"></i>Textarea Autosize
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Charts</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2"></i>ChartJS
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="metismenu-icon pe-7s-graph"></i>Apex Charts
                    </a>
                </li>
                <li>
                    <a href="charts-sparklines.html">
                        <i class="metismenu-icon pe-7s-graph1"></i>Chart Sparklines
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>