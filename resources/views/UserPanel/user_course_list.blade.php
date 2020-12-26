@extends('main')

@section('user_course_list')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h1>Курс и название курса</h1>
            </div>
        </div>
    </div>
    <div class="container display-flex">
        <div class="embed-responsive player-custom">
            <video class="embed-responsive-item" width="420" height="540" controls preload="auto">
                <source src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0">
            </video>
        </div>
       <div class="courses-list-container">
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
           <div class="card-custom card-custom-padding">
               1. Aлгоритмы
           </div>
       </div>
    </div>
    <div class="container">
        <div class="section-title section-title-margin-top">
            <h1>Дополнительные материалы к курсу</h1>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="card-collapse">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div>
                        Anim pariatur cliche reprehenderit,
                        enim eiusmod high life accusamus terry richardson
                        ad squid. 3 wolf moon officia aute, non cupidatat ska
                        teboard dolor brunch. Food truck quinoa nesciunt laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird o
                        n it squid single-origin coffee nulla assumenda shoreditch et
                        . Nihil anim keffiyeh helvetica, craft beer labore wes anderso
                        n cred nesciunt sapiente ea proident. Ad vegan excepteur bu
                        tcher vice lomo. Leggings occaecat craft beer farm-to-tab
                        le, raw denim aesthetic synth nesciunt you probably haven't
                        heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card-collapse">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div>
                        Anim pariatur cliche reprehenderit, enim
                        eiusmod high life accusamus terry richardson ad s
                        quid. 3 wolf moon officia aute, non cupidatat skatebo
                        rd dolor brunch. Food truck quinoa nesciunt laborum eius
                        mod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on
                        it squid single-origin coffee nulla assumenda shore
                        ditch et. Nihil anim keffiyeh helvetica, craft beer
                        labore wes anderson cred nesciunt sapiente ea proident
                        . Ad vegan excepteur butcher vice lomo. Leggings occae
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
