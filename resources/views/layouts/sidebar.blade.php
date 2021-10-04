<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }} 
                            <span class="user-level">
                                Admin                               
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a data-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                        <span class="caret"></span>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Companies</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ url('/companies') }}">
                                    <span class="sub-item">List Companies</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/companies/create') }}">
                                    <span class="sub-item">Add Companies</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#bimbingan">
                        <i class="fas fa-user-friends"></i>
                        <p>Employe</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="bimbingan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ url('/khs') }}">
                                    <span class="sub-item">List employe</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/khs') }}">
                                    <span class="sub-item">Add employe</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->