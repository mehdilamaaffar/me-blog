<nav class="w-full border-b-2 border-grey-light bg-white h-10 mb-10 h-auto">
    <div class="container mx-auto h-full px-6">
        <div class="flex items-center justify-center h-12">
            <div class="mr-6">
                <a href="{{ url('/') }}" class="no-underline">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="flex-1 text-right relative">
                <a href="#" id="toggleDropdown" class="text-grey-darker text-sm pr-4">{{ Auth::user()->name }}</a>
                <div class="hidden rounded shadow-md absolute pin-t pin-r bg-white px-6 py-2 mt-8" id="dropdown">
                    <ul class="list-reset">
                        @guest
                            <li><a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Login</a></li>
                            <li><a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('logout') }}" class="no-underline hover:underline text-grey-darker text-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">{{ csrf_field() }}</form>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        var state;

        document.getElementById('toggleDropdown').onclick = function () {
            if (document.getElementById('dropdown').style.display == '' || document.getElementById('dropdown').style.display == 'none') {
                state = 'block';
            } else {
                state = 'none';
            }

            document.getElementById('dropdown').style.display = state;
        }
    </script>
@endpush
