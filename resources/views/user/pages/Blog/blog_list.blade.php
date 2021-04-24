@extends('user.layouts.default_user')

@section('content')
    <section class="custom-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 row-justify-content-center section-title-margin-top">
                    <div class="section-title section-title-center">
                        <h1>Познавательные вещи и новости</h1>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>

            <?php
                $cols = 3;
                $rows = 0;
            ?>
            <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 col-sm-4">
                    <a href="{{ route('single', $post) }}">
                        <div class="blog-part" style="background-image: url('{{ URL::asset($post->thumbnail) }}');">
                            <div class="blog-part-overlay">{{ $post['title'] }}</div>
                        </div>
                    </a>
                </div>
                <?php
                    $rows++;
                    if ($rows % $cols == 0) echo '</div><div class="row">';
                ?>
            @endforeach
            </div>
        </div>
    </section>
@endsection
