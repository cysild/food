@if ((count($category->children) > 0) AND ($category->parent_id > 0))

  <?php $item  =  Helper::category_count($category->id); ?>
                                            @if($item > 0)

    <li><a href="#{{ $category->name}} ">{{ $category->name}} <i class="fa fa-chevron-right"></i></a>

    @endif
@else
  
  <?php $item  =  Helper::category_count($category->id); ?>
                                            @if($item > 0)
    <li><a href="#{{ $category->name}}" class="submenu">{{ $category->name}}</a> 

@endif

@endif

    @if (count($category->children) > 0)

        <ul class="submenu-items">

        @foreach($category->children as $category)
  <?php $item  =  Helper::category_count($category->id); ?>
                                            @if($item > 0)
 @if ($category->status == 1)
            @include('frontend.menu', $category)


    @endif
  @endif
        @endforeach

        </ul>

    @endif

    </li>