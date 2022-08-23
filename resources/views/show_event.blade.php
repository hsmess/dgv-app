@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Upload Date
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            @if($event == null)
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                                <a href="javascript:unfavouriteAll()" style="font-size: small" class="text-indigo-200 hover:text-indigo-300 text-sm-center">Unfavourite All</a>
                            </th>
                             @endif
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{$item->user->avatar}}" alt="" />
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$item->user->name}}</div>
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$item->user->disc_golf_valley_name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                               <span class="px-2 inline-flex text-xs leading-5 font-semibold">
                                       {{$item->created_at->toDayDateTimeString()}}
                               </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if($item->type == 0)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                       Image
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                       Video
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="show-media/{{$item->id}}" class="text-indigo-600 hover:text-indigo-900">Show</a>

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

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>

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
        function unfavouriteAll()
        {
            axios.post('/api/ufa')
            alert('All media unfavourited.');
            window.location.href = '/admin';
        }
    </script>
@endsection
