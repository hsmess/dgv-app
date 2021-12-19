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
                                Event Name
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($events as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold">
                                     {{ $item->name }}
                               </span>
                            </td>


                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">


                                <a href="admin/event/{{$item->slug}}" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-black focus:outline-none focus:border-gray-400 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                    Go To Event
                                </a>
                                @if($item->display_on_dash)
                                <a href="admin/event/{{$item->slug}}/toggle" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-black focus:outline-none focus:border-orange-400 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                    Disable
                                </a>
                                @else
                                <a href="admin/event/{{$item->slug}}/toggle" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-black focus:outline-none focus:border-orange-400 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                    Enable
                                </a>
                                @endif
                                <a href="/batch/increment?event_id={{$item->id}}" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-black focus:outline-none focus:border-green-400 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                    Start New Event
                                </a>
                                <a href="admin/event/{{$item->slug}}/video-library" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-purple-600 hover:bg-black focus:outline-none focus:border-green-400 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                    Show Library
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
