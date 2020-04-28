@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">

        @if(count($live) > 0)
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Live Tournaments
                </h3>
            </div>
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul>
                    @foreach($live as $tournament)
                        <li>
                            @if($tournament->auth_user_registered_on)
                                <a href="/tournaments/{{$tournament->id}}/play" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            @else
                                <a href="/tournaments/{{$tournament->id}}/spectate" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            @endif
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <time datetime="{{$tournament->start_time->toDateString()}}" class="icon">
                                                <em>{{$tournament->start_time->format('l')}}</em>
                                                <strong>{{$tournament->start_time->format('F')}}</strong>
                                                <span>{{$tournament->start_time->format('d')}}</span>
                                            </time>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <div class="text-sm leading-5 font-medium text-indigo-600 truncate">{{$tournament->name}}</div>
                                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                    <span class="truncate"><span class="truncate">Tournament Underway</span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif






        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Upcoming Tournaments
            </h3>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul>
                @foreach($upcoming as $tournament)
                <li>
                    @if($tournament->auth_user_registered_on)
                        <a href="/tournaments/{{$tournament->id}}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        @else
                    <a href="/tournaments/{{$tournament->id}}/register" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    @endif

                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="min-w-0 flex-1 flex items-center">
                                <div class="flex-shrink-0">
                                    <time datetime="{{$tournament->start_time->toDateString()}}" class="icon">
                                        <em>{{$tournament->start_time->format('l')}}</em>
                                        <strong>{{$tournament->start_time->format('F')}}</strong>
                                        <span>{{$tournament->start_time->format('d')}}</span>
                                    </time>
                                </div>
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <div class="text-sm leading-5 font-medium text-indigo-600 truncate">{{$tournament->name}}</div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            <span class="truncate">{{$tournament->players->count()}}/{{$tournament->max_players}} registered</span>
                                        </div>
                                    </div>
                                    <div class="block">
                                        @if($tournament->auth_user_registered_on)
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            Registered on {{$tournament->auth_user_registered_on}}
                                        </div>
                                        @else
                                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                                Not yet registered
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                               <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                   <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
