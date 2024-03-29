<ul class="nav nav-pills nav-stacked app-navi nano-content">
    @foreach(config('block.navi') as $key=>$val)
    <?php 
        $filters = [];
        foreach($val as $alias=>$route){
            if( \App::make(config('auth.providers.users.model'))->has_permission(['route'=>$alias, 'controller'=>$route['ctrl']]) ){
                $filters[$alias] = $route;
            }
        }
    ?>
    @if ($key!=='' && count($filters))<li class="header">{{ trans('app.'.$key) }}</li>@endif
        @foreach($filters as $alias=>$route)
        <li class="{{ $alias==uri() ? 'active':'' }}">
            <a href="{{ $alias }}"><span class="{{ $route['icon'] }}"></span> <span Class="item-label">{{ trans('app.'.$alias) }}</span></a>
        </li>
        @endforeach
    @endforeach
</ul>