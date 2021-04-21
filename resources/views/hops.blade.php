@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <img src="https://discgolfvalley.s3.eu-west-2.amazonaws.com/hops.png" alt="Workflow logo" />
                        <p class="mt-1 text-sm leading-5 text-gray-600">
                           Any highlights or lowlights can be screen-recorded and uploaded and will be shown on stream!
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white sm:p-6">


                                <div class="mt-6">
                                    <label class="block text-sm leading-5 font-medium text-gray-700">
                                        Screenshot or video
                                    </label>
                                    <!-- Target DOM node #1 -->
                                    <div class="for-DragDrop"></div>

                                    <!-- Progress bar #1 -->
                                    <div class="for-ProgressBar"></div>

                                    <!-- Uploaded files list #1 -->
                                    <div class="uploaded-files">
                                        <h5>Uploaded files:</h5>
                                        <ol></ol>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <span class="inline-flex rounded-md shadow-sm">
{{--              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">--}}
{{--                Save--}}
{{--              </button>--}}
            </span>
                            </div>
                        </div>
                    </form>
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
