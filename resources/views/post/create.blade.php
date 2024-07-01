@extends('layout')

@section('content')
    <div class="m-6">
        <h2 class="text-2xl font-semibold text-pink-500 mb-3">Make Your Post ☺</h2>

        <form class=" gap-2" action="{{ route('post.store') }}" method="POST">
        @csrf
        <input type="text" class="w-[20%] h-[50%] bg-pink-100  border-red-400 border-2 text-red-900 placeholder-red-900 p-4 rounded-lg" name="title" placeholder="Title..." min="1" max="50">
        <input type="text" class="w-[50%] h-[90%] bg-pink-100  border-red-400 border-2 text-red-900 placeholder-red-900 p-4 rounded-lg" name="content" placeholder="Write..." min="1" max="400">
        <button type="submit" class="bg-pink-500 hover:bg-pink-900 text-white font-bold py-2 px-4 ml-4 rounded-lg"">POST</button>
        <div>
            <div class="inline-flex">
            <a class=" text-white hover:text-pink-400 m-6 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-4 dark:bg-pink-500 dark:hover:bg-white  mx-auto" href="">Comment</a>
            </div>    
            <div class="inline-flex">
            <a class=" text-white hover:text-red-400 m-6 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-4 dark:bg-red-600 dark:hover:bg-white  mx-auto" href="{{ route('post.index') }}"> Back</a>
            </div>
        </div>
        </form>
    </div>


@endsection