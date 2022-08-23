@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div class="bg-gray-200 overflow-hidden rounded-lg">
            <div class="px-4 py-5 sm:p-6 flex items-center justify-center">
                {{--{{dd($url)}}--}}
                <img style="width: 960px; " src="{{$url}}" class="text-center">
            </div>
        </div>
        <div class="px-4 py-5 sm:p-6 flex items-left justify-left">
            <a href="javascript:unfavourite({{$item->id}});" id="unfavouriteme_{{$item->id}}"  @if($item->favourite) style="color: goldenrod; display: inline-block; margin-left: 20px;" @else  style="color: goldenrod; display: none; margin-left: 20px;"  @endif>
                <svg  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="display:inline">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </a>
            <a href="javascript:favourite({{$item->id}});"  id="favouriteme_{{$item->id}}" @if($item->favourite) style="color: goldenrod; display: none; margin-left: 20px;" @else  style="color: goldenrod; display: inline-block; margin-left: 20px;"  @endif>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
            </a>
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
        function unfavourite(id) {
            // e.preventDefault();
            axios.post('/api/unfavourite-media/' + id).then(function (response) {
                document.getElementById('unfavouriteme_'+id).style.display = "none";
                document.getElementById('favouriteme_'+id).style.display = "inline-block";
            })
        };
        function favourite(id) {
            console.log(document.getElementById('favouriteme_'+id));
            axios.post('/api/favourite-media/' + id).then(function (response) {
                document.getElementById('favouriteme_'+id).style.display = "none";
                document.getElementById('unfavouriteme_'+id).style.display = "inline-block";
            })
        };
    </script>
@endsection
