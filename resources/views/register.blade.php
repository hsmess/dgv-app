@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Tournament Registration</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-600">
                            Please confirm your player name and intention to complete the tournament
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2"  x-data="{ boxchecked: false }">
                    <form action="/tournaments/{{$tournament->id}}/register" method="POST">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="disc_golf_valley_name"
                                               class="block text-sm font-medium leading-5 text-gray-700">
                                            Disc Golf Valley Player Name<span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input id="disc_golf_valley_name" name="disc_golf_valley_name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input x-model="boxchecked" id="comments" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="comments" class="font-medium text-gray-700">I will do my best to play all of the rounds<span class="text-red-500">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <span class="inline-flex rounded-md shadow-sm">
                                      <button :disabled='!boxchecked' type="submit"
                                              class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                        Save
                                      </button>
                                    </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
