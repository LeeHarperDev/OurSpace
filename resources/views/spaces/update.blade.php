@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center mt-10">
        <img src="{{ asset($space->icon_picture_path) }}" width="200" height="200" class="rounded-full mb-5" />
        <h1 class="text-4xl font-bold">Update {{ $space->name }}</h1>
        <form method="post" action="{{ route('spaces.update', ['space' => $space->id])  }}" enctype="multipart/form-data"
              class="flex flex-col mr-auto ml-auto space-y-5 mt-5">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $space->name }}" />
            </div>
            <div class="flex flex-col">
                <label for="description">Description:</label>
                <textarea rows="10" cols="30" name="description">{{ $space->description }}</textarea>
            </div>
            <div class="flex flex-col">
                <label for="icon_picture">Icon Picture:</label>
                <input type="file" name="icon_picture" />
            </div>
            <div class="flex flex-col">
                <label for="banner_picture">Banner Picture:</label>
                <input type="file" name="banner_picture" />
            </div>
            <button type="submit" class="p-3 bg-gray-400 border border-black rounded w-20 ml-auto mr-auto">Submit</button>
        </form>
        <form class="flex flex-col mr-auto ml-auto space-y-5 mt-5" method="post"
              action="{{ route('spaces.destroy', ['space' => $space->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-3 bg-red-400 border border-black rounded w-40 ml-auto mr-auto">Delete Space</button>
        </form>
    </div>
@endsection
