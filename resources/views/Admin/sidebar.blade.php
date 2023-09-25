<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        @foreach (json_decode($sidebars) as $row)
        <a href="{{ $row->Link }}" class="list-group-item list-group-item-action py-2 ripple 
            {{ (request()->segment(1) == $row->Link) ? 'active' : '' }}
            ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>{{ $row->Menu; }}</span>
        </a>
        @endforeach
        
        <a href="/Logout" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>LOGOUT</span>
        </a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->