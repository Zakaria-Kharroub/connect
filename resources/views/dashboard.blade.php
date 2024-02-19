@extends('layouts.layout')
@section('content')
    <div class="h-screen overflow-y-scroll bg-white" style="margin-top: 8rem">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 md:grid-cols-2 lg:gap-8">
            <div class="post p-5 lg:p-1 rounded-md">
                <div class="lg:fixed lg:top-14 lg:left-14 lg:w-3/12 md:fixed md:w-5/12" style="margin-top: 9rem;">



                    <div class="bg-light p-8 rounded-lg shadow-md max-w-md w-full" >
                        <h2 class="text-center mb-4">nouveau post</h2>


                        <form action="{{ route('addPost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Post Content Section -->
                            <div class="mb-6" >
                                <label for="postContent" class="block text-gray-700 text-sm font-bold mb-2">Post Content:</label>
                                <textarea id="postContent" name="content"
                                 rows="4" class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500" placeholder="What's on your mind?"></textarea>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="date_creation" value="{{ date('Y-m-d H:i:s') }}">
                            <!-- File Attachment Section -->
                            <div class="mb-6">
                                <label for="fileAttachment" class="block text-gray-700 text-sm font-bold mb-2">telecharger image</label>
                                <div class="relative border-2 rounded-md px-4 py-3 bg-white flex items-center justify-between hover:border-blue-500 transition duration-150 ease-in-out">
                                    <input type="file" id="fileAttachment" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"></input>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <span class="ml-2 text-sm text-gray-600">Choose a file</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button and Character Limit Section -->
                            <div class="flex items-center justify-between">
                                <button type="submit" class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-white py-2 px-4 rounded-md transition duration-300 gap-2"> Post </button>
                            </div>
                        </form>
                    </div>




                </div>
            </div>




            {{-- cards --}}
            <div class="lg:col-span-2 p-4 bg-light mt-3" id="posted">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 "  >



                    <!-- First Column -->
                    @foreach ($posts as $post)
                    <div class="bg-white p-8 rounded-lg shadow-md max-w-md">
                        <!-- User Info with Three-Dot Menu -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <img src="https://placekitten.com/40/40" alt="User Avatar" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="text-gray-800 font-semibold">{{ $post->user->name }}</p>
                                    <p class="text-gray-500 text-sm">{{ $post->date_creation }}</p>
                                </div>
                            </div>
                            <div class="text-gray-500 cursor-pointer">


                                <div class="dropdown">
                                    <button class="btn btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical text-lg "></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">




                                       {{-- button modal edit --}}
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}">
                                            edit <i class="fa-solid fa-pencil"></i>
                                          </button>



                                     <form action="{{route('deletePost',$post->id)}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger" >delete <i class="fa-solid fa-trash"></i></button>
                                      </form>

                                    </div>
                                  </div>
                            </div>
                        </div>
                        <!-- Message -->
                        <div class="mb-4">
                            <p class="text-gray-800"> {{ $post->content }} </p>
                        </div>
                        <!-- Image -->
                        <div class="mb-4">
                            <img src="storage/images/{{$post->image}}" alt="Post Image" class="w-full h-60 object-cover rounded-md">
                        </div>
                        <!-- Like and Comment Section -->
                        <div class="flex items-center justify-between text-gray-500">
                            <div class="flex items-center space-x-2">
                                <button class="flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
                                    <i class="fa-regular fa-heart"></i>
                                    <span>42 Likes</span>
                                </button>
                            </div>
                            <button class="flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
                                <span> {{ $post->comments->count() }} Comments </span> <i class="fa-solid fa-comment text-lg "></i>
                            </button>
                        </div>
                    </div>



                    <!-- Modal update -->
<div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$post->content}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Post Content Section -->
                <div class="mb-6" >
                    <label for="postContent" class="block text-gray-700 text-sm font-bold mb-2">Post Content:</label>
                    <textarea id="postContent" name="content"
                              rows="4" class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500" placeholder="What's on your mind?">
                     {{$post->content}}
                    </textarea>
                </div>
                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="date_creation" value="{{ date('Y-m-d H:i:s') }}"> --}}
                <!-- File Attachment Section -->
                <div class="mb-6">
                    <label for="fileAttachment" class="block text-gray-700 text-sm font-bold mb-2">telecharger image</label>
                    <div class="relative border-2 rounded-md px-4 py-3 bg-white flex items-center justify-between hover:border-blue-500 transition duration-150 ease-in-out">
                        <input type="file" id="fileAttachment" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"></input>
                        <div class="flex items
                        -center">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="ml-2 text-sm text-gray-600">Choose a file</span>
                        </div>~
                    </div>
                </div>
                <!-- Submit Button and Character Limit Section -->
                <div class="flex items
                -center justify-between">
                    <button type="submit" class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-white py-2 px-4 rounded-md transition duration-300 gap-2"> Post </button>
                </div>


                </form>








        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>


@endsection
