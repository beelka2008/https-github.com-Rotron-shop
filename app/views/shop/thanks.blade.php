@extends('layout',['kostenko' => ['name' => 'ok']])
{{-- Content --}}

@section('content')
    @if ($page->link == 'contacts')
<!-- ========================================= MAIN ========================================= -->
<main id="contact-us" class="inner-bottom-md">
    <section class="google-map map-holder">
        <div id="map" class="map center"></div>
        <form role="form" class="get-direction">
            <div class="container">
                <div class="row">
                    <div class="center-block col-lg-10">
                        <div class="input-group">
                            <input type="text" class="le-input input-lg form-control" placeholder="Enter Your Starting Point">
                            <span class="input-group-btn">
                                <button class="btn btn-lg le-button" type="button">Get Directions</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>
        </form>
    </section>

    <div class="container">
        <div class="row">
            
            <div class="col-md-8">
                <section class="section leave-a-message">
                    <h2 class="bordered">{{ $page->title }}</h2>
                    <p>{{ $page->content }}</p>
                    
                    <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" >
                    <h2 class="bordered">Оставьте сообщение</h2>
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Ваше имя*</label>
                                <input class="le-input" >
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>Ваш email*</label>
                                <input class="le-input" >
                            </div>
                        </div><!-- /.field-row -->
                        
                        <div class="field-row">
                            <label>Тема</label>
                            <input type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Ваше сообщение</label>
                            <textarea rows="8" class="le-input"></textarea>
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Отправить</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.contact-form -->
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->

            <div class="col-md-4">
                <section class="our-store section inner-left-xs">
                    <h2 class="bordered">Наш магазин</h2>
                    <address>
                        17 Princess Road <br/>
                        London, Greater London <br/>
                        NW1 8JR, UK
                    </address>
                    <h3>Hours of Operation</h3>
                    <ul class="list-unstyled operation-hours">
                        <li class="clearfix">
                            <span class="day">Monday:</span>
                            <span class="pull-right hours">12-6 PM</span>
                        </li>
                        <li class="clearfix">
                            <span class="day">Tuesday:</span>
                            <span class="pull-right hours">12-6 PM</span>
                        </li>
                        <li class="clearfix">
                            <span class="day">Wednesday:</span>
                            <span class="pull-right hours">12-6 PM</span>
                        </li>
                        <li class="clearfix">
                            <span class="day">Thursday:</span>
                            <span class="pull-right hours">12-6 PM</span>
                        </li>
                        <li class="clearfix">
                            <span class="day">Friday:</span>
                            <span class="pull-right hours">12-6 PM</span>
                        </li>
                        <li class="clearfix">
                            <span class="day">Saturday:</span>
                            <span class="pull-right hours">12-6 PM</span>
                        </li>
                        <li class="clearfix">
                            <span class="day">Sunday</span>
                            <span class="pull-right hours">Closed</span>
                        </li>
                    </ul>
                    <h3>Career</h3>
                    <p>If you're interested in employment opportunities at MediaCenter, please email us: <a href="mailto:contact@yourstore.com">contact@yourstore.com</a></p>
                </section><!-- /.our-store -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
<!-- ========================================= MAIN : END ========================================= -->
    @else
<!-- ========================================= MAIN ========================================= -->
<main id="terms" class="inner-bottom-md">
    <div class="container">
        <section class="section section-page-title">
            <div class="page-header">
                <h2 class="page-title">{{ $page->title }}</h2>
            </div>
        </section><!-- /.section-page-title -->
        <p>{{ $page->content }}</p>
    </div>
</main><!-- /.inner-bottom-md -->
<!-- ========================================= MAIN ========================================= -->
    @endif
@stop