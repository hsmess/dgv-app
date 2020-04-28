@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="bg-blue-50 px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="{{Auth::user()->avatar}}" alt="" />
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{$tournament->name}}
                                </h3>
                                <p class="text-sm leading-5 text-gray-500">
                                <span>
                                   Admin Access Granted
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:p-6">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6"  x-data="{tournament_state:{{$tournament->state}}}" @message-recieved.window="tournament_state = $event.detail.state">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Actions
                        </h3>
                        <template x-if="tournament_state === 0">
                            <div class="mt-5 sm:flex sm:items-center">
                                <span class="mt-3 inline-flex rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                                <button @click="startTournament()" type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 sm:w-auto sm:text-sm sm:leading-5">
                                  Start Tournament
                                </button>
                                </span>
                            </div>
                        </template>
                        <template x-if="tournament_state !== 0">
                            <div class="mt-5 sm:flex sm:items-center">
                                <div class="w-full">
                                    Players are now playing round <span x-text="tournament_state"></span>. You will see them appear below as the groups are initialised. Feel free to go on them to check.
                                    You will see a button for each appear as the scorecard is submitted, please click it and enter the data below. Once the FULL data is populated, click 'next tournament round' to move on to the next round of the tournament, and players will be told their next game.
                                </div>
                            </div>
                            <div class="mt-5 sm:flex sm:items-center" x-data="{selectedTab: 1, items:{}}">
                                <div>
                                    <div>
                                        <div class="border-b border-gray-200">
                                            <nav class="-mb-px flex">
                                                <template x-for="(item, index) in items" :key="index">
                                                    <div>
                                                        <a x-show="selectedTab == index" href="#" class="whitespace-no-wrap ml-8 py-4 px-1 border-b-2 border-indigo-500 font-medium text-sm leading-5 text-indigo-600 focus:outline-none focus:text-indigo-800 focus:border-indigo-700" aria-current="page">
                                                            <span x-html="item.code"></span>
                                                        </a>
                                                        <a  x-show="selectedTab != index" href="#" class="whitespace-no-wrap ml-8 py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                                            Billing
                                                        </a>
                                                    </div>
                                                </template>
                                            </nav>
                                        </div>
                                        <template x-for="(item, index) in items" :key="index">
                                            <div class="flex flex-col" x-show="selectedTab == index">
                                                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                                        <table class="min-w-full">
                                                            <thead>
                                                                <tr>
                                                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        Player
                                                                    </th>
                                                                    <template x-for="(item2, index2) in item.games">
                                                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            Game <span x-html="index2"></span>
                                                                        </th>
                                                                    </template>
                                                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        Total Score Under Par
                                                                    </th>
                                                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Screenshot(s)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <template x-for="(item2, index2) in item.players">
                                                                <tr class="bg-white">
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                                        <span x-html="item2.name"></span>
                                                                    </td>
                                                                    <template x-for="(item3, index3) in item2.games">
                                                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                                            <input type="number" x-model="item2.index3.score">
                                                                        </td>
                                                                    </template>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                                                        <span x-html="item2.totalscore"></span>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                                                        <template x-for="(item4, index4) in item2.screenshots">
                                                                            <div class="tmp">
                                                                                <a x-model:href=""></a>
                                                                            </div>
                                                                        </template>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:flex sm:items-center">
                                <span class="mt-3 inline-flex rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                                <button @click="startTournament()" type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 sm:w-auto sm:text-sm sm:leading-5">
                                  Next Tournament Round
                                </button>
                            </span>
                            </div>
                        </template>
{{--                                                 <div class="max-w-xs w-full">
                                    <label for="email" class="sr-only">Multiplayer Code</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <input id="code" class="form-input block w-full sm:text-sm sm:leading-5" placeholder="XXXX" />
                                    </div>
                                </div>--}}
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        Echo.channel('admin-message-channel')
            .listen('AdminNewMessage', (e) => {
                console.log(e.message.message);
                var event = new CustomEvent('message-recieved', {detail: {state: e.message.state }});
                window.dispatchEvent(event);
            });

        function startTournament() {
            axios.get('/api/tournaments/{{$tournament->id}}/start');
        }
    </script>
@endsection
