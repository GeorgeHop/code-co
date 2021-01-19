@extends('user.layouts.default_user')

@section('content')
<section id="pricing" class="custom-section" data-stellar-background-ratio="0.5" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title">
                            <h1>{{ $course->name }}</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-10 col-sm-10">
                            <div class="post-thumbnail course-thumbnail-img" style="background-image: url('{{ URL::asset($course->thumbnail) }}')">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7">

                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="thumbnail-card">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! $course->info !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="section-title section-title-margin-top">
                        <h1>Варианты курсов</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        @foreach($course->offers as $offer)
                            <div class="col-md-4">
                                <div class="pricing-thumb">
                                    <div class="pricing-title">
                                        <h2>{{ $course['name'] }}</h2>
                                        <h3>{{ $offer->title }}</h3>
                                    </div>
                                    <div class="pricing-info">
                                        {!! $offer->description !!}

                                        <p>{{ $course['duration'] }}/ дней</p>
                                    </div>
                                    <div class="pricing-bottom">
                                        <span class="pricing-dollar">{{ $offer['cost'] }}</span>
                                        <button type="button" onclick="pay({{ $offer }},{{ $course }},{{ Auth::user() }});" class="section-btn pricing-btn">Купить</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-2"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="section-title section-title-margin-top">
                        <h1>Расписание курса</h1>
                    </div>

                    <div class="accordion" id="accordionExample">
                        @foreach($course->videos as $video)
                            <div class="card-collapse">
                                <div class="card-header" id="card_{{$loop->index}}">
                                    <h2 class="mb-0">
                                        <button class="collapse-course-list-btn" type="button" data-toggle="collapse" data-target="#collapse_card_{{$loop->index}}" aria-expanded="false" aria-controls="collapse_card_{{$loop->index}}">
                                            {{ $video->title }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse_card_{{$loop->index}}" class="collapse" aria-labelledby="card_{{$loop->index}}" data-parent="#accordionExample">
                                    <div class="collapse-content-inner-wrapper">
                                        <h3>{{ $video->title }}</h3>
                                        <p>
                                            {!! $video->description !!}
                                        </p>
                                        @foreach($video->materials as $material)
                                            <h3>{{ $material->title }}</h3>
                                            <p>
                                                {!! $material->description !!}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
<script id="widget-wfp-script" language="javascript" type="text/javascript" src="https://secure.wayforpay.com/server/pay-widget.js"></script>

<script type="text/javascript">
    var wayforpay = new Wayforpay();
    var pay = function (offer, course, user) {
        wayforpay.run({
                merchantSecretKey: 'flk3409refn54t54t*FNJRET',
                merchantAccount : "test_merch_n1",
                merchantDomainName : "{{ URL::to('/') }}",
                authorizationType : "SimpleSignature",
                merchantSignature : "b95932786cbe243a76b014846b63fe92",
                orderReference : offer.id,
                orderDate : "1415379863",
                amount : offer.cost,
                currency : offer.currency,
                productName : course.name + offer.title,
                productPrice : offer.cost,
                productCount : '1',
                clientFirstName : "",
                clientLastName : "",
                clientEmail : user.email,
                clientPhone: "",
                language: "RU",
                requestType: 'VERIFY'
            },
            function (response) {
// on approved
            },
            function (response) {
// on declined
            },
            function (response) {
// on pending or in processing
            }
        );
    }
</script>
@endsection
