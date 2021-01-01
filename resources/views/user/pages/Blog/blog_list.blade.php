@extends('user.layouts.default_user')

@section('content')
    <section class="custom-section">
        <div class="container">
            <div class="row">
                <div class="section-title-margin-top">
                    <h1>Познавательные вещи и новости</h1>
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
                        <div class="blog-part">
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
