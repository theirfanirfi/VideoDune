      @extends('Frontend._PublicLayout')
      @section('content')
      <!--Start of Latest Area-->
                <div class="latest-area text-left ptb-90">
                    <div class="container">
                        <div class="row">

                                @include('Frontend.includes.alert')

                                @foreach ($videos as $v )
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="single-video-area">
                                            <div class="video-img">
                                                <div class="game">
                                                    <a href="#"><video  alt="" style="width:100%;" controls muted>
                                                        <source src="{{ URL::asset('/mvideos/') }}/{{ $v->video_name }}" type="video/mp4">
                                                    </video></a>
                                                </div>
                                                <div class="video-icon">
                                                    <a href="{{ route('video',['id' => $v->id]) }}">
                                                        <i class="icofont icofont-play-alt-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="single-video-content">
                                                <h5><a href="{{ route('video',['id' => $v->id]) }}">
                                                    @if(!empty($v->video_title))
                                                    {{ $v->video_title }}
                                                    @else
                                                    {{ $v->video_name }}
                                                    @endif
                                                </a></h5>
                                                <p>{{ $v->getVideoAuthor() }}</p>
                                                <ul>
                                                    <li><a href="{{ route('likevideo',['id' => $v->id]) }}"><i class="icofont icofont-heart" @if($v->checkWhetherLikedOrNot() > 0) {{ $v->checkWhetherLikedOrNot() }} style="color:red;" @endif></i></a> @if( $v->getVideoLikesCount() > 0) {{ $v->getVideoLikesCount() }} @endif</li>
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
                <!-- Start of Footer area -->
@endsection
