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

                {{-- name, title, parameters, attributes --}}
                <header><h5>{{ link_to_route('listings.show', $listing->title, ['id' => $listing->id], ['class' => 'listing-title-link']) }}</h5></header>

                <section>
                    <div>
                        <strong>{{ $listing->suburb->name }}</strong>,&nbsp;<span class="listing-address">{{ $listing->getStreetAddress() }}</span>
                    </div>
                </section>

                <footer>
                    @if(Auth::check())
                    <span style="height: 30px" class="btn icon-star3 {{ $wish }}" title="{{ $title}}" data-address="{{ $listing->getStreetAddress() }}"></span>
                    @else

                    <a href="{{ URL::route('login') }}" style="height: 30px" class="btn icon-star wish-off" title="Sign-in to create a wishlist"></a>
                    @endif

                    <span class="right listing-price">$ {{ $listing->getFormattedPrice() }}</span>
                </footer>
            </article>
        </li>
    @endforeach
</ul>