@extends('Frontend._PublicLayout')
@section('content')


<div class="full-video pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="embed-responsive embed-responsive-16by9">
                            <video  alt="" style="width:100%;" controls muted>
                                    <source src="{{ URL::asset('/mvideos/') }}/{{ $video->video_name }}" type="video/mp4">
                                </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
