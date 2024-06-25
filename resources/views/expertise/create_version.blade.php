{{-- @extends('layouts.app')

@section('title')
    {{ __('Выбор версии документа') }}
@endsection

@section('content')
<main class="content">
    <div class="container">
        <div class="breadcrumbs">
            <a class="breadcrumbs__home" href="/">
                <svg>
                    <use xlink:href="/assets/images/sprite.svg#house"></use>
                </svg>
            </a>
            /
            <a href="{{ route('expertise.index') }}">{{ trans('app.m_expert') }}</a>
        </div>

        <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

        @include('expertise.menu')

        <div class="actions">
            @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') )
                <a href="{{ route('expertise.create_new_version', ['expertise' => $expertise->id]) }}" class="btn btn-primary">
                    Создать новую версию
                </a>
            @endif  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($versionsTwo) && $versionsTwo->isNotEmpty())
                @foreach($versionsTwo as $versionTwo)
                <tr>
                    <td class="table__name">
                        @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))
                            <a href="{{ route('expertise.edit', ['expertise' => $expertise->expertise_id, 'version' => $versionTwo->version_number]) }}">
                                Версия {{ $versionTwo->version_number }}
                            </a>
                        @else
                            <a href="{{ route('expertise.approve.info', ['id' => $expertise->expertise_id, 'version_id' => $versionTwo->version_number]) }}">
                                Версия {{ $versionTwo->version_number }}
                            </a>
                        @endif
                    </td>
                    <td class="table__status">{{ $versionTwo->version_number }}</td>
                    <td class="table__status">{{ $versionTwo->created_at }}</td>
                    <td class="table__status">Черновик</td>
                </tr>
                @endforeach
            @endif    
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                            @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))
                                <a href="{{ route('expertise.edit', ['expertise' => $version->id, 'version' => $version->version_number]) }}">
                                    Версия {{ $version->version_expertise == 0 ? 1 : $version->version_expertise }}
                                </a>
                            @else
                                <a href="{{ route('expertise.approve.info', ['id' => $version->id, 'version_id' => $version->version_number]) }}">
                                    Версия {{ $version->version_expertise }}
                                </a>
                            @endif
                        </td>
                        <td class="table__status">{{ $version->version }}</td>
                        <td class="table__status">{{ $version->updated_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection



 --}}


 @extends('layouts.app')

@section('title')
    {{ __('Выбор версии документа') }}
@endsection

@section('content')
<main class="content">
    <div class="container">
        <div class="breadcrumbs">
            <a class="breadcrumbs__home" href="/">
                <svg>
                    <use xlink:href="/assets/images/sprite.svg#house"></use>
                </svg>
            </a>
            /
            <a href="{{ route('expertise.index') }}">{{ trans('app.m_expert') }}</a>
        </div>

        <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

        @include('expertise.menu')

        <div class="actions">
            @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') )
                <a href="{{ route('expertise.create_new_version', ['expertise' => $expertise->id]) }}" class="btn btn-primary">
                    Создать новую версию
                </a>
            @endif  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($versionsTwo) && $versionsTwo->isNotEmpty())
                @foreach($versionsTwo as $versionTwo)
                <tr>
                    <td class="table__name">
                        @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))
                            <a href="{{ route('expertise.edit', ['expertise' => $expertise->id, 'version' => $versionTwo->version_number]) }}">
                                Версия {{ $versionTwo->version_number }}
                            </a>
                        @else
                            <a href="{{ route('expertise.approve.info', ['id' => $expertise->id, 'version_id' => $versionTwo->version_number]) }}">
                                Версия {{ $versionTwo->version_number }}
                            </a>
                        @endif
                    </td>
                    <td class="table__status">{{ $versionTwo->version }}</td>
                    <td class="table__status">{{ $versionTwo->created_at }}</td>
                    <td class="table__status">Черновик</td>
                </tr>
                @endforeach
            @endif    
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                                <a href="{{ route('expertise.edit', ['expertise' => $version->id, 'version' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise == 0 ? 1 : $version->version_expertise }}
                                </a>
                        </td>
                        {{-- <td class="table__name">
                            @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') && request()->is('ru/expertise/draf*'))
                                <a href="{{ route('expertise.edit', ['expertise' => $version->id, 'version' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise == 0 ? 1 : $version->version_expertise }}</a>
                            @else
                                <a href="{{ route('expertise.approve.info', ['id' => $version->id, 'version_id' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise }}</a>
                            @endif
                        </td> --}}
                        <td class="table__status">{{ $version->version }}</td>
                        <td class="table__status">{{ $version->updated_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
