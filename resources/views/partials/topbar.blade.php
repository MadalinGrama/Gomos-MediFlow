  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a>
        <i class="bi bi-phone"></i> <a href="tel:{{ $settings['phone'] }}">{{ $settings['phone'] }}</a>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">      
    @foreach ($socialLinks as $platform => $link)
        @php
            // Alegeți iconul corespunzător pentru fiecare platformă socială
            $iconClass = '';
            switch ($platform) {
                case 'twitter':
                    $iconClass = 'bi-twitter';
                    break;
                case 'facebook':
                    $iconClass = 'bi-facebook';
                    break;
                case 'instagram':
                    $iconClass = 'bi-instagram';
                    break;
                case 'linkedin':
                    $iconClass = 'bi-linkedin';
                    break;
                // Adăugați alte platforme sociale după nevoie
            } 
        @endphp

        {{-- Afișează link-urile sociale --}}
        <a href="{{ $link }}" class="{{ $platform }}">
            <i class="bi {{ $iconClass }}"></i>
        </a>
    @endforeach
</div>

    </div>
  </div>