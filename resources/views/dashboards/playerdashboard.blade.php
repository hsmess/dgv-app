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
                                    Player Name: <strong>{{Auth::user()->disc_golf_valley_name}}</strong>
                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-4 mt-4 flex-shrink-0 flex">
                            <span class="inline-flex rounded-md shadow-sm" x-data="{open: false}">
                              <button @click="open = true" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                               <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Forefit...
                              </button>
                                <div x-show.transition="open" class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
                                  <div class="fixed inset-0 transition-opacity">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                  </div>
                                  <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                      <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                          <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                          </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                          <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Quit the tournament?
                                          </h3>
                                          <div class="mt-2">
                                            <p class="text-sm leading-5 text-gray-500">
                                              Are you sure you want to quit the tournament? This will have serious negative impacts on the remainder of the games to be played. Please reconsider?
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          I'm an asshole
                                        </button>
                                      </span>
                                      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        <button @click="open = false" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                            I'll keep playing
                                        </button>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                            </span>
                        </div>
                    </div>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:p-6">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6"  x-data="{current_instruction: 'This is where your current instruction will appear once the tournament starts',instruction_id:0}" @message-recieved.window="current_instruction = $event.detail.msg; instruction_id = $event.detail.ins_id">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Your Instructions
                        </h3>
                        <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                            <p x-text="current_instruction"></p>
                        </div>
                        <template x-if="instruction_id == 2">
                            <div class="mt-5 sm:flex sm:items-center">
                                <div class="max-w-xs w-full">
                                    <label for="email" class="sr-only">Multiplayer Code</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <input id="code" class="form-input block w-full sm:text-sm sm:leading-5" placeholder="XXXX" />
                                    </div>
                                </div>
                                <span class="mt-3 inline-flex rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                                <button @click="" type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 sm:w-auto sm:text-sm sm:leading-5">
                                  Save
                                </button>
                            </span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        Echo.channel('orders-{{Auth::user()->email}}')
            .listen('PlayerMessageSent', (e) => {
                var event = new CustomEvent('message-recieved', {detail: {msg: e.message.message, ins_id: e.message.id }});
                window.dispatchEvent(event);
            });
    </script>
@endsection
