@extends('inner')
@section('content')
<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h3 class="entry-title">
                Name : {{ $signature->name }}
              </h3>
              <h5>
                Job: {{ $signature->job }}
              </h5>
              <h5>
                Company: {{ $signature->company }}
              </h5>
              <h5>
                Email: {{ $signature->email }}
              </h5>
              <h5>
                Address: {{ $signature->address }}
              </h5>
              <h5>
                Phone: {{ $signature->phone }}
              </h5>
              <form action="/destroySignature/{{ $signature->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Supprimer</button>
              </form>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->
@endsection
