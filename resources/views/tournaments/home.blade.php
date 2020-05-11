@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
         @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
            <span class="inline-flex rounded-md shadow-sm">
              <a href="/tournaments/create" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
               <svg width="15px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
               &nbsp; Create Tournament
              </a>
            </span>
         @endif
        @if(count($tournaments) > 0)
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Tournaments
                </h3>
            </div>
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul>
                    @foreach($tournaments as $tournament)
                        <li>
                            @if($tournament->authUserIsRegistered())
                                <a href="/tournaments/{{$tournament->id}}/play" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            @elseif($tournament->status == 0)
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
                                                    <span class="truncate">
                                                              @if($tournament->authUserIsRegistered() && $tournament->status == 0)
                                                                Registered. Starts {{$tournament->start_time->diffForHumans()}}
                                                                @elseif($tournament->status == 0)
                                                                Registration Open
                                                                @elseif($tournament->status < 3)
                                                                  Tournament Underway
                                                                @else
                                                                  Tournament Completed
                                                                @endif
                                                     </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @if($tournament->authUserIsRegistered() || $tournament->status == 0)
                                            <div>
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    </div>
                                @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Tournaments will appear here...
                    </h3>
                    <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                        <p>
                            Once a tournament is available, it will appear here instead of this card. Please check back in the future to play some DGV Tournaments!
                        </p>
                    </div>
                    <div class="mt-3 text-sm leading-5">
                        <a href="https://facebook.com/dontshootdiscgolf" class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                            Follow me on social media for announcements
                        </a>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
@endsection
