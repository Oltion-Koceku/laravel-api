@extends('layouts.admin')

@section('content')

<div class="container m-5">

    <h1>Ricerca in base alla Technologie</h1>

    <form class="d-flex" action="{{ route('admin.projects.index') }}" method="GET" role="search">
        <input name="title" class="form-control me-2" type="search" placeholder="Cerca Il tuo Progetto"
            aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>


    <table class="table table-striped project-table w-100">
        <thead>
            <tr>
                <th scope="col"><a
                        href="{{ route('admin.orderby', ['direction' => $direction, 'column' => 'id']) }}">ID</a></th>
                <th scope="col"><a
                        href="{{ route('admin.orderby', ['direction' => $direction, 'column' => 'title']) }}">Nome</a>
                </th>
                <th scope="col">Descrizione</th>
                <th scope="col">Img</th>
                <th scope="col">Type</th>
                <th scope="col">Technologie (Click badge)</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>
                        <p>{{ $project->id }}</p>
                    </td>
                    <td class="">
                        <form id="form-{{ $project->id }}" action="{{ route('admin.projects.update', $project) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <p value="" type="text" name="title">{{ $project->title }}</p>
                        </form>
                    </td>

                    <td>
                        <p>{{ $project->description }}</p>
                    </td>

                    <td>
                        @if ($project->img)
                            <img class="w-100" src="{{ asset('storage/' . $project->img) }}"
                                alt="{{ $project->title }}">
                        @else
                            <img class="w-100" src="/img/no-img.jpg" alt="no img">
                        @endif
                    </td>

                    <td>
                        @if ($project->type)
                            {{ $project->type->title }}
                        @else
                            --No Type--
                        @endif

                    </td>

                    <td>
                        @if ($project->technologie)
                            @forelse ($project->technologie as $technologie)
                                <span class="badge text-bg-success"><a class="text-decoration-none text-white" href="{{route('admin.searchTechnologie', $technologie->title)}}">{{ $technologie->title }}</a></span>
                            @empty
                                No Technologie
                            @endforelse
                        @endif



                    </td>

                    <td class="h-100">
                        <div class="button d-flex">
                            <form action="{{ route('admin.projects.edit', $project) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-warning mx-2"><i
                                        class="fa-solid fa-pencil"></i></button>
                            </form>

                            <form onsubmit="return confirm('Sei sicuro di voler eliminare il progietto=')"
                                action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
                            </form>

                            <form class="mx-2" method="GET" action="{{ route('admin.projects.show', $project) }}">

                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-eye"></i></button>
                            </form>
                        </div>


                    </td>



                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $projects->onEachSide(5)->links() }}
</div>


 @endsection
