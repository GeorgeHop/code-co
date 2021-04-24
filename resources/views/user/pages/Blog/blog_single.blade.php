@extends('user.layouts.default_user')

@section('content')
    <section class="custom-section">
        <div class="container">

           <div class="row">
               <div class="col-md-3">

               </div>
               <div class="col-md-6 row-justify-content-center">
                   <div class="section-title section-title-center">
                       <h1>{{ $post->title }}</h1>
                   </div>
               </div>
               <div class="col-md-3">

               </div>
           </div>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8 col-sm-8 col-centered">
                    <div class="post-thumbnail">
                        <img alt="" src="{{ URL::asset($post->thumbnail) }}"/>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
           <div class="row">
               <div class="col-md-2">

               </div>
               <div class="col-md-8 col-sm-8">
                   @if(!$post->is_visible_for_all && !Auth::check())
                       <h3 style="{{ !$post->is_visible_for_all && !Auth::check() ? '-webkit-mask-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0))); height:250px' : '' }}">{!! substr(strip_tags($post->description), 0, 550) !!}</h3>
                       <div class="blog-single-description">
                           <h4>Вам нужно создать аккаунт чтобы видеть записи на этой странице. <a href="{{ route('registration') }}">Создать аккаунт ?</a></h4>
                       </div>
                   @else
                       {!! $post->description !!}
                   @endif
               </div>
               <div class="col-md-2">
               </div>
           </div>
        </div>
    </section>
@endsection
