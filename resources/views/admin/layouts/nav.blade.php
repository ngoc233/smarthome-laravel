  <nav class="main-menu">
    <ul>
      <li>
        <a href="{{url('temperature')}}">
          <i class="fa fa-home nav_icon"></i>
          <span class="nav-text">
          Dashboard
          </span>
        </a>
      </li>
      <li>
        <a href="{{url('temperature')}}">
          <i class="icon-table nav-icon"></i>
          <span class="nav-text">
          Nhiệt Độ
          </span>
        </a>
      </li>
      <li>
        <a href="{{url('homehumidity')}}">
          <i class="icon-tint nav-icon"></i>
          <span class="nav-text">
          Độ ẩm trong nhà
          </span>
        </a>
      </li>
      <li>
        <a href="{{url('landhumidity')}}">
          <i class="icon-flickr nav-icon"></i>
          <span class="nav-text">
          Độ khô của đất
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="icon-lightbulb nav-icon"></i>
          <span class="nav-text">
          Quản lý quạt
          </span>
        </a>
      </li>
    </ul>
    <ul class="logout">
      <li>
      <a href="{{url('admin/logout')}}">
      <i class="icon-off nav-icon"></i>
      <span class="nav-text">
      Logout
      </span>
      </a>
      </li>
    </ul>
  </nav>