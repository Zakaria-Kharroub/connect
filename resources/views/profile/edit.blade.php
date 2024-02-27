@extends('layouts.layout')
@section('content')
    <div class="p-16">
        <div class="p-8 bg-white shadow mt-24 h-[37rem]">
            <div class="">
                <div class="relative">
                    <div
                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                @if(Auth::check())
                    @if($user->id !== Auth::user()->id)
                        <div class="space-x-8 flex  mt-32 md:mt-0 ">
                            <form id="followForm" method="post" action="{{ route('followOrUnfollow', $user->id) }}">
                                @csrf
                                <button type="submit" id="followBtn" class="text-white py-2 px-4 uppercase rounded bg-blue-700 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                    @if($result == 'following')
                                        Unfollow
                                    @else
                                        Follow
                                    @endif

                                </button>
                            </form>
                            <a href="{{route('messages' , $user->id)}}"
                               class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                Message
                            </a>
                        </div>
                    @else
                        <button type="submit" class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Edit Profile
                        </button>
                       <form action="{{route('delete_profile', $user->id)}}">
                           @csrf
                           <button type="submit" class="text-white py-2 px-4 uppercase rounded bg-danger hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                               Delete Profile
                           </button>
                       </form>
                    @endif
                @endif
                <div class="mt-20 text-center border-b pb-12">
                    <h1 class="text-4xl font-medium text-gray-700">{{$user->name}} </h1>
                    <p class="font-light text-gray-600 mt-3">Email: <strong>{{$user->email}}</strong></p>
                    <p class="mt-8 text-gray-500">Phone Number <strong>{{$user->phone}}</strong></p>
                    <p class="mt-2 text-gray-500">Address: <strong>{{$user->address}}</strong></p>
                </div>
            </div>

            <div class="mt-12 flex flex-col justify-start">
                <p class="text-gray-600 text-center font-light lg:px-16">
                    {{$user->bio}}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-3 relative top-[-4rem] text-center order-last md:order-first mt-20 md:mt-0">
            <div>
                <p class="font-bold text-gray-700 text-xl">22</p>
                <p class="text-gray-400">Friends</p>
            </div>
            <div>
                <p class="font-bold text-gray-700 text-xl">10</p>
                <p class="text-gray-400">Photos</p>
            </div>
            <div>
                <p class="font-bold text-gray-700 text-xl">89</p>
                <p class="text-gray-400">Comments</p>
            </div>
        </div>
    </div>

<script>
    document.getElementById('followForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        axios.post(form.action)
            .then(function(response) {
                var buttonText = form.querySelector('#followBtn');
                if (response.data === "followed") {
                    buttonText.textContent = "Unfollow";
                } else if (response.data === "unfollowed") {
                    buttonText.textContent = "Follow";
                }
            })
            .catch(function(error) {
                alert(error);
            });
    });

</script>

@endsection

