@extends('layouts.app', ['dataTest' => 'urls'])
@section('content')
<div class="container-lg mt-3">
    <h1>Проверки сайта: </h1>
    <h3>{{ $url->name }}</h3>
    <form method="POST" action="{{ route('urls.checks.store', $url) }}" class="d-flex justify-content-end mb-5">
        <input type="hidden" name="url" value="{{ $url->id }}">
        <a class="btn btn-success" type="submit">
            Проверить
        </a>
    </form>

    <div class="table-responsive">
        @if(count($urlChecks) > 0)
        <table class="table table-bordered table-hover text-nowrap" data-test="urls">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Последняя проверка</th>
                    <th>Код ответа</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urlChecks as $check)
                <tr>
                    <td>
                        {{ $check?->id }}
                    </td>
                    <td>
                        {{-- <a href="{{ route('urls.show', $check) }}" class="href"> --}}
                        {{ $check?->name }}
                        {{-- </a>  --}}
                    </td>

                    <td>{{ now() }}</td>
                    <td>200</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="info">Пока проверок не было</div>
        @endif
    </div>


    {{-- {{ $urlChecks->links('pagination::bootstrap-5') }} --}}

</div>
@endsection
