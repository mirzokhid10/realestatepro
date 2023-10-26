@extends("frontend.frontend_dashboard")

@section('main')

    {{-- banner section --}}
    @include('frontend.home.banner')
    {{-- end banner section --}}

    {{-- category section --}}
    @include('frontend.home.category')
    {{-- end category section --}}

    {{-- download feature --}}
    @include('frontend.home.feature')
    {{-- end download feature --}}

    {{-- download video --}}
    @include('frontend.home.video')
    {{-- end download video --}}

    {{-- deals section --}}
    @include('frontend.home.deals')
    {{-- end deals section --}}

    {{-- testimonial section --}}
    @include('frontend.home.testimonial')
    {{-- end testimonial section --}}

    {{-- chooseus section --}}
    @include('frontend.home.chooseus')
    {{-- end chooseus section --}}

    {{-- place section --}}
    @include('frontend.home.place')
    {{-- end place section --}}

    {{-- team section --}}
    @include('frontend.home.team')
    {{-- end team section --}}

    {{-- cta section --}}
    @include('frontend.home.cta')
    {{-- end cta section --}}

    {{-- news section --}}
    @include('frontend.home.news')
    {{-- end news section --}}

    {{-- download section --}}
    @include('frontend.home.download')
    {{-- end download section --}}

@endsection
