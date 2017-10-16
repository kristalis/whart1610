<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
       
      </div>
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ @url('homes/create') }}"><i class="fa fa-circle-o text-red"></i> <span>Home Page</span></a></li>
        <li><a href="{{ @url('abouts/create') }}"><i class="fa fa-circle-o text-yellow"></i> <span>About Page</span></a></li>
        <li><a href="{{ @url('rooms/create') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Accommodation</span></a></li>
        <li><a href="{{ @url('functionrooms/create') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Function Room</span></a></li>
        <li><a href="{{ @url('menus/create') }}"><i class="fa fa-circle-o text-white"></i> <span>Menu Page</span></a></li>

         <li><a href="{{ @url('events/create') }}"><i class="fa fa-circle-o text-blue"></i> <span>Events Page</span></a></li>
        <li><a href="{{ @url('galleries/create') }}"><i class="fa fa-circle-o text-green"></i> <span>Galleries</span></a></li>
        <li><a href="{{ @url('contacts/create') }}"><i class="fa fa-circle-o text-purple"></i> <span>Contact</span></a></li>
        <li><a href="{{ @url('spanel') }}"><i class="fa fa-gears text-red"></i> <span>Settings</span></a></li>
                           <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out text-red"></i> <span>Logout</span>         
                                            
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                               

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>