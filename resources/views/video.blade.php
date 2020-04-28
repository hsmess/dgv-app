@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div class="bg-gray-200 overflow-hidden rounded-lg">
            <div class="px-4 py-5 sm:p-6 flex items-center justify-center">
                {{--{{dd($url)}}--}}
                <video
                    id="my-video"
                    class="video-js  text-center"
                    controls
                    preload="auto"
                    width="960"
                    height="540"
                    data-setup="{}"
                >
                    <source src="{{$url}}" type="application/x-mpegURL" />
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank"
                        >supports HTML5 video</a
                        >
                    </p>
                </video>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        var player = videojs('my-video', {
            html5: {
                hls: {
                    overrideNative: true
                },
                nativeVideoTracks: false,
                nativeAudioTracks: false,
                nativeTextTracks: false
            }
        });
        player.play();
    </script>
@endsection
