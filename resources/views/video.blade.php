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
        @if(isset($mediaID))
        <div class="px-4 py-5 sm:p-6 flex items-center justify-center">
            <button id="downloadButton" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-black focus:outline-none focus:border-green-400 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150" onclick="requestDownload()">Request Download</button>
            <button id="waitingButton" style="visibility: hidden" disabled="disabled" class="disabled  inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-200 focus:outline-none focus:border-green-400 focus:shadow-outline-indigo transition ease-in-out duration-150">Download Requested: please wait</button>
            <a href="#" style="visibility: hidden" id="linkButton" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-purple-600 hover:bg-black focus:outline-none focus:border-purple-400 focus:shadow-outline-indigo active:bg-indigo-500 transition ease-in-out duration-150" >Download Now</a>
        </div>
        @endif
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

        function requestDownload() {
            document.getElementById('downloadButton').style.visibility = "hidden";
            document.getElementById('waitingButton').style.visibility = "visible";
            axios({
                method: 'post',
                url: '/request-video-download',
                data: {
                    mediaID: @json($mediaID ?? null)
                }
            })  .then(function (response) {
                document.getElementById('waitingButton').style.visibility = "hidden";
                document.getElementById('linkButton').style.visibility = "visible";
                document.getElementById('linkButton').href = response.data.download_url;
            });
        }
    </script>
@endsection
