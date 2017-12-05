@extends('layouts.app')

    <!-- Styles -->
@section('css')
 <link href="{{asset('css/freelancer.css')}}" rel="stylesheet" type="text/css">
@endsection


@section('content')
<div  class="container">
    <div id="seleccionMD" class="row">
        <div class="col-md-12">
           
                    <!-- menu Grid Section -->
   <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Areas</h2>
                    <hr class="star-primary">
<a href="#" class="btm btn-warning btn-sm" v-on:click.prevent="editSucursal()">Editar</a>

                </div>
            </div>
            <div class="row">

                <div id="modulo1" class="col-sm-4 portfolio-item" style="display:block;">
                    <a href="{{ url('administrador') }} " class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x" >RH</i>
                            </div>
                        </div>
                        <img src="{{ asset('/img/cabin.png') }}" class="img-responsive" alt="Cabin" title="omar">
                    </a>
                </div>
                <div id="modulo2" class="col-sm-4 portfolio-item " style="display:none;">
                    <a href="{{ url('/capacitacion') }}" class="portfolio-link" data-toggle="modal" >
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x">2</i>
                            </div>
                        </div>
                        <img src="{{ asset('/img/cake.png') }}" class="img-responsive" alt="Slice of cake">
                    </a>
                </div>
                <div id="modulo3" class="col-sm-4 portfolio-item" style="display:none;" >
                    <a href="{{ url('/arma') }}" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x">3</i>
                            </div>
                        </div>
                        <img src="{{ asset('/img/circus.png') }}" class="img-responsive" alt="Circus tent">
                    </a>
                </div>
                <div id="modulo4" class="col-sm-4 portfolio-item" style="display:none;" >
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x">4</i>
                            </div>
                        </div>
                        <img src="{{ asset('/img/game.png') }}" class="img-responsive" alt="Game controller">
                    </a>
                </div>
                <div id="modulo5" class="col-sm-4 portfolio-item" style="display:none;">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x">5</i>
                            </div>
                        </div>
                        <img src="{{ asset('/img/safe.png') }}" class="img-responsive" alt="Safe">
                    </a>
                </div>
                <div id="modulo6" class="col-sm-4 portfolio-item" style="display:none;">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x">6</i>
                            </div>
                        </div>
                        <img src="{{ asset('/img/submarine.png') }}" class="img-responsive" alt="Submarine">
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

    @include('sucursal')
<!--
    <div class="col-sm-5">
        <pre>
            @{{$data}}
        </pre>
    </div>

-->

    </div>

</div>



@endsection
