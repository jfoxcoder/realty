<span>
    <a href="#" data-dropdown="drop1" class="button dropdown tiny">Sort by <span class="sort-label">{{$sorter->sort->title}}</span></underline></a><br>
    <ul id="drop1" data-dropdown-content class="f-dropdown">
        @foreach($sorter->sorts as $sort)
        <li>
            {{ link_to_route($route, $sort->title, ['sort' => $sort->title]) }}
        </li>
        @endforeach
    </ul>
</span>