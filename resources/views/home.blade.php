@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div class="bg-gray-900">
            <div class="pt-12 sm:pt-16 lg:pt-24">
                <div class="max-w-screen-xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto lg:max-w-none">
                        <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">
                          SELECT YOUR GAME
                        </h2>
                        <p class="mt-2 text-3xl leading-9 font-extrabold text-white sm:text-4xl sm:leading-10 lg:text-5xl lg:leading-none">
                            Please select which tournament you are playing
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-8 pb-12 bg-gray-900 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
                <div class="relative">
                    <div class="absolute inset-0 h-3/4 bg-gray-900"></div>
                    <div class="relative z-10 max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="max-w-md mx-auto lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5">
                            <a href="/hopsandhyzer">
                            <div class="rounded-lg shadow-lg overflow-hidden">
                                <img src="https://discgolfvalley.s3.eu-west-2.amazonaws.com/hops.png" alt="Workflow logo" />
                            </div>
                            </a>
                            <a href="/dynamic-discs-open">
                            <div class="mt-4 rounded-lg shadow-lg overflow-hidden lg:mt-0">
                                <img src="https://discgolfvalley.s3.eu-west-2.amazonaws.com/ddo.png" alt="Workflow logo" />
                            </div>
                            </a>
{{--                            <a href="/discgolfuk">--}}
{{--                                <div class="mt-4 rounded-lg shadow-lg overflow-hidden lg:mt-0">--}}
{{--                                    <img src="/img/dguk.png" alt="Workflow logo" />--}}
{{--                                </div>--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        const onUploadSuccess = (elForUploadedFiles) =>
            (file, response) => {
                const url = response.uploadURL
                const fileName = file.name

                document.querySelector(elForUploadedFiles).innerHTML +=
                    `<li><a href="${url}" target="_blank">File Uploaded Successfully. No need to submit</a></li>`
            }

        const uppyOne = new Uppy({ debug: true, autoProceed: true })
        uppyOne
            .use(DragDrop, { target: '.for-DragDrop' })
            .use(XHRUpload, {endpoint: '/uppy-hops',formData:true,fieldName:'files[]',headers:{'X-CSRF-TOKEN':"{{csrf_token()}}"}})
            .use(ProgressBar, { target: '.for-ProgressBar', hideAfterFinish: false })
            .on('upload-success', onUploadSuccess('.uploaded-files ol'))

    </script>
@endsection
