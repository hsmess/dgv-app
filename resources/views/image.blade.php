@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div class="bg-gray-200 overflow-hidden rounded-lg">
            <div class="px-4 py-5 sm:p-6 flex items-center justify-center">
                {{--{{dd($url)}}--}}
                <img style="width: 960px; " src="{{$url}}" class="text-center">
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
