@extends('inner')
@section('content')
    <!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8 entries">
            @if(auth()->check())
            @foreach($signatures as $signature)
            <article class="entry">

              <h2 class="entry-title">
                <a href="{{ route('details', $signature->id) }}">Signature {{ $loop->index }}</a>
              </h2>

              <div class="entry-content">
            <!--
                <p>
                  Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                  Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                </p>
            -->
                <div class="read-more">
                  <a href="{{ route('details', $signature->id) }}">Plus ...</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
            @endif
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->
    <p>
      <?php  $email = Auth::user()->email; ?>
      {{$email}}
    </p>
    @endsection
