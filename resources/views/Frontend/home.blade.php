@extends('Frontend._PublicLayout')

@section('content')
@include('Frontend.includes.slider')

<!--Start of Latest Area-->
                <div class="latest-area text-left ptb-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="section-title text-center">
                                    <h2 class="text-uppercase">latest videos</h2>
                                    <i class="icofont icofont-video-cam"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="latest-owl">

                                @foreach ($videos as $v )
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="single-video-area">
                                            <div class="video-img">
                                                <div class="game">
                                                        <video  alt="" style="width:100%;" controls muted>
                                                                <source src="{{ URL::asset('/mvideos/') }}/{{ $v->video_name }}" type="video/mp4">
                                                                </video>
                                                </div>
                                            <!--    <div class="video-icon" >
                                                    <a href="blog-details.html">
                                                        <i class="icofont icofont-play-alt-2"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                            <div class="single-video-content">
                                                <h5><a href="{{ route('video',['id' => 3]) }}">{{ $v->video_name }}</a></h5>
                                                <p>{{ $v->name }}</p>
                                                <ul>
                                                    <li><i class="icofont icofont-heart"></i>255</li>
                                                   <!-- <li><i class="icofont icofont-eye-alt"></i>788</li> -->
                                                    <li><i class="icofont icofont-ui-clock"></i>{{ substr($v->created_at,0,10) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Latest Area -->
@endsection
