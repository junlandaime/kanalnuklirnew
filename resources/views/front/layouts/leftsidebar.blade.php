{{-- @dd(request()->routeIs('front.people' . $person->slug)) --}}
{{-- @dd(request()->) --}}
@if (request()->routeIs('front.news') || request()->routeIs('front.category*'))
    @forelse ($categories->where('id','!=', 3) as $category)
        <ul class="tabbable faq-tabbable">
            <li class="active"><a href="#tab_1" data-toggle="tab">{{ $category->name }}</a></li>
            @foreach ($category->child as $child)
                @if ($child->posts->count() != 0)
                    <li><a href="{{ route('front.category', $child) }}">{{ $child->name }}</a>
                    </li>
                @endif
            @endforeach

        </ul>
    @empty
    @endforelse
@elseif(request()->routeIs('front.people*'))
    <ul class="tabbable faq-tabbable">
        @forelse ($people as $person)
            <li
                class="{{ url()->current() == route('front.people_details', ['person' => $person->slug]) ? 'active' : '' }}">
                <a href="{{ route('front.people_details', $person) }}">{{ $person->name }}</a>
            </li>
            {{-- <li><a href="#tab_2" data-toggle="tab">Membership</a></li> --}}

        @empty
        @endforelse

    </ul>
@elseif(request()->routeIs('front.about*'))
    <ul class="tabbable faq-tabbable">
        <li class="{{ url()->current() == route('front.about') ? 'active' : '' }}"><a
                href="{{ route('front.about') }}">Our Contact</a></li>
        <li class="{{ url()->current() == route('front.about_lecturer') ? 'active' : '' }}"><a
                href="{{ route('front.about_lecturer') }}">Our Lecturer</a></li>
        <li class="{{ url()->current() == route('front.about_roadmap') ? 'active' : '' }}"><a
                href="{{ route('front.about_roadmap') }}">Roadmap Profile</a></li>
        {{-- <li class="{{ url()->current() == route('front.about') ? 'active' : '' }}"><a
                href={{ route('front.about') }}">License Terms</a></li>
        <li class="{{ url()->current() == route('front.about') ? 'active' : '' }}"><a
                href={{ route('front.about') }}">Payment Rules</a></li>
        <li class="{{ url()->current() == route('front.about') ? 'active' : '' }}"><a
                href={{ route('front.about') }}">Other Questions</a></li> --}}
    </ul>
@endif
