@extends('main')

@section('contacts')
    <section data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <video class="header-small-video" playsinline autoplay muted loop>
            <source src="/video/rainingCode.mp4">
        </video>
    </section>
    <section class="custom-section">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h1>Контакты</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="card-collapse">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Telegram
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div>
                            link on telegram
                        </div>
                    </div>
                </div>
                <div class="card-collapse">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Viber
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div>
                            Link on viber
                        </div>
                    </div>
                </div>
                <div class="card-collapse">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div>
                            Anim pariatur cliche reprehender
                            it, enim eiusmod high life accusamu
                            s terry richardson ad squid. 3 wolf moon officia
                            aute, non cupidatat skateboard dolor brunch. Food truck quinoa n
                            esciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                            bird on it squid single-origin coffee nulla assumenda shore
                            ditch et. Nihil anim keffiyeh helvetica, craft beer labore wes and
                            erson cred nesciunt sapiente ea proident. Ad vegan excepteur but
                            cher vice lomo. Leggings occaecat craft beer farm-to-table, raw d
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
