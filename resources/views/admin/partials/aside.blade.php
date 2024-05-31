<aside>
    <div class="container">
        <ul class="navbar p-2 w-100">
            <li class="{{Route::currentRouteName() === 'admin.projects.index' ? 'bg-white' : ''}} w-100"><a href="{{route('admin.projects.index')}}"><i class="fa-solid fa-bars-progress"></i> Projects</a></li>
            <li class="{{Route::currentRouteName() === 'admin.projects.create' ? 'bg-white' : ''}} w-100"><a href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus"></i> Crea un Progetto</a></li>
            <li class="{{Route::currentRouteName() === 'admin.technologies.index' ? 'bg-white' : ''}} w-100"><a href="{{route('admin.technologies.index')}}"><i class="fa-solid fa-microchip"></i> Technologies</a></li>
            <li class="{{Route::currentRouteName() === 'admin.types.index' ? 'bg-white' : ''}} w-100"><a href="{{route('admin.types.index')}}"><i class="fa-solid fa-keyboard"></i> Types</a></li>
        </ul>
    </div>
</aside>
