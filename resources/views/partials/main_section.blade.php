<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

  <div class="d-flex justify-content-between align-items-center">
    <h2>{{ $page->title }}</h2>
    <ol>
        <li><a href="{{ route('homeurl') }}">Home</a></li>

        @php
            $breadcrumbs = explode('/', request()->getPathInfo());
            $currentPath = '/';
            $excludeFromBreadcrumbs = ['admin', 'pages'];
        @endphp

        @foreach($breadcrumbs as $crumb)
            @if($crumb && !in_array($crumb, $excludeFromBreadcrumbs))
                @php
                    $currentPath .= $crumb.'/';
                @endphp
                <li><a href="{{ $currentPath }}">{{ ucfirst($crumb) }}</a></li>
            @endif
        @endforeach

    </ol>
</div>



  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">  
  @yield('content-section')
  </div>
</section>

</main> <!-- End main -->
