@extends('layout')

@section('content')
   <!-- post -->
   <div class="m-6 text-center">
   <a class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 ml-4 rounded-lg" href="{{ route('post.create') }}">CREATE POST</a>
   </div>

   @if ($message = Session::get('success'))
         <div class="p-4 mb-4 text-sm text-pink-800 rounded-lg bg-pink-50 dark:bg-gray-800 dark:text-pink-400">
            <p>{{ $message }}</p>
         </div>
    @endif

    <table class="min-w-full text-center text-sm font-light text-surface dark:text-white">
        <thead class="border-b border-neutral-200 bg-pink-200 font-medium text-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Post</th>
                <th scope="col" class="px-6 py-3">Content</th>
                <th scope="col" class="px-6 py-3" width="280px">Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr class="border-b border-neutral-200 dark:border-white/10">
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content}}</td>
                <td>
                    <form action="{{ route('post.destroy',$post->id) }}" method="POST">
    
                        <a class="text-white bg-gray-900 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"  href="{{ route('post.show',$post->id) }}">Show</a>
        
                        <a class="inline-block focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" href="{{ route('post.edit',$post->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mt-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection