@extends('user.layouts.default_user')

@section('content')
    <section class="custom-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 row-justify-content-center section-title-margin-top">
                    <div class="section-title">
                        <h1>Контакты</h1>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card-collapse">
                    <div class="card-header" id="one">
                        <h2 class="mb-0">
                            <button class="collapse-course-list-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Telegram
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="one" data-parent="#accordionExample">
                        <div class="collapse-content-inner-wrapper">
                            <h3>Название аккаунта</h3>
                            <p>
                                ссылка на аккаунт
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-collapse">
                    <div class="card-header" id="two">
                        <h2 class="mb-0">
                            <button class="collapse-course-list-btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Instagram
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="two" data-parent="#accordionExample">
                        <div class="collapse-content-inner-wrapper">
                            <h3>Название аккаунта</h3>
                            <p>
                                Тут у нас важные посты о всем самом интересном: ссылка на аккаунт
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-collapse">
                    <div class="card-header" id="three">
                        <h2 class="mb-0">
                            <button class="collapse-course-list-btn" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Viber
                            </button>
                        </h2>
                    </div>

                    <div id="three" class="collapse" aria-labelledby="three" data-parent="#accordionExample">
                        <div class="collapse-content-inner-wrapper">
                            <h3>Название аккаунта</h3>
                            <p>
                                Ну а тут всеми любимый фейсбук: ссылка на аккаунт
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
