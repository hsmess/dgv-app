@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Create a new tournament</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-600">
                           Please select your format and name the tournament
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2" >
                    <form action="/tournaments/create" method="POST">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="tournament_name"
                                               class="block text-sm font-medium leading-5 text-gray-700">
                                            Tournament Name<span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input id="tournament_name" name="tournament_name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                        </div>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="start_time"
                                               class="block text-sm font-medium leading-5 text-gray-700">
                                            Tournament Date & Time<span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input id="start_time" name="start_time" type='datetime-local' class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                        </div>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="format"
                                               class="block text-sm font-medium leading-5 text-gray-700">
                                            Format<span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-sm rounded-md shadow-sm">
                                                <select id="format" name='dgv_format' class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @foreach($formats as $id => $format)
                                                        <option value="{{$id}}">{{$format}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <span class="inline-flex rounded-md shadow-sm">
                                      <button  type="submit"
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
