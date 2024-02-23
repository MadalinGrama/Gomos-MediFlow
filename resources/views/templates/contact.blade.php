@extends('templates.onlycontent')

@section('content-section')
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Contact US</h2>
      <p>{!! $page->content !!}</p>
    </div>
  </div>

  <div>
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
  </div>

  <div class="container">
    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>{{ $settings['address'] }}</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>{{ $settings['email'] }}</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>{{ $settings['phone'] }}</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        {!! Form::open(['route' => 'admin.contact.store', 'method' => 'post', 'role' => 'form', 'class' => 'php-email-form']) !!}
        @csrf
        <div class="row">
          <div class="col-md-6 form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Your Name', 'required']) !!}
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Your Email', 'required']) !!}
          </div>
        </div>
        <div class="form-group mt-3">
          {!! Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject', 'placeholder' => 'Subject', 'required']) !!}
        </div>
        <div class="form-group mt-3">
          {!! Form::textarea('message', null, ['class' => 'form-control', 'id' => 'message', 'rows' => 5, 'placeholder' => 'Message', 'required']) !!}
        </div>
        <!-- <div class="my-3">
    <div class="loading">Loading</div>
    <div class="error-message"></div>
    <div class="sent-message">Your message has been sent. Thank you!</div>
  </div> -->
        <div class="text-center">
          {!! Form::submit('Send Message', ['class' => 'btn btn-primary']) !!}
        </div>
        @if(session('success'))
        <div class="alert alert-success mt-2" role="alert">
          <p> {{ session('success') }}</p>
        </div>
        @endif
        {!! Form::close() !!}
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
@endsection