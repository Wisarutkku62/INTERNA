@auth
    @if (auth()->user()->role === 'company')
        @include('layouts.company_nav')
    @elseif (auth()->user()->role === 'student')
        @include('layouts.student_nav')
    <!-- @elseif (auth()->user()->role === 'admin')
        @include('partials.nav_admin') -->
    @endif
@else
    @include('layouts.student_nav')
@endauth