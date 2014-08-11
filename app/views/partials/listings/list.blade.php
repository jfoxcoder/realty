<ul id="listings"
    class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 columns">

    @foreach ($listings as $listing)
        @if (Auth::check())
        <?php
            $on = in_array($listing->id, $wishes);
            $wish = $on ? 'wish-on' : 'wish-off';
            $title = $on ? 'Remove from wishlist' : 'Add to wishlist';
        ?>
        @endif

        <li data-listing="{{ $listing->id }}">
            <article class="listing-item-inner">

                <a href="{{ URL::route('listings.show', ['id' => $listing->id]) }}"><img src="{{ $listing->getLeadPhotoUrl() }}" /></a>

                <header>{{ $listing->title }}</header>

                <section></section>

                <footer>
                    @if(Auth::check())
                    <div style="height: 30px" class="btn icon-heart {{ $wish }}" title="{{ $title}}"></div>
                    @else

                    <a href="{{ URL::route('login') }}" style="height: 30px" class="btn icon-heart wish-off" title="Sign-in to create a wishlist"></a>
                    @endif
                </footer>
            </article>
        </li>
    @endforeach
</ul>