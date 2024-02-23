<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="{{ route('homeurl') }}">Gomos Medisoft</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        @foreach($menuItems as $menuItem)
        @if($menuItem->children->isEmpty())
        <li class="{{ Request::is($menuItem->url) ? 'active' : '' }}">
          <a class="nav-link" href="{{ $menuItem->url }}">{{ $menuItem->title }}</a>
        </li>
        @else
        <li class="dropdown {{ Request::is($menuItem->url) ? 'active' : '' }}">
          <a href="#" class="nav-link">
            <span>{{ $menuItem->title }}</span> <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            @foreach($menuItem->children as $child)
            <li class="{{ Request::is($child->url) ? 'active' : '' }}">
              <a href="{{ $child->url }}">{{ $child->title }}</a>
            </li>
            @endforeach
          </ul>
        </li>
        @endif
        @endforeach
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


    <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
  </div><!-- End Header -->
</header>