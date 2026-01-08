@extends('layouts.app', ['dataTest' => 'urls'])
@section('content')
<div class="container-lg mt-3">
    <h1>Сайты</h1>
    <div class="table-responsive">
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
                @foreach ($urls as $url)
                <tr>
                    <td>
                        {{ $url?->id }}
                    </td>
                    <td>
                        <a href="{{ route('urls.show', $url) }}" class="href">
                            {{ $url?->name }}
                        </a>
                    </td>

                    <td>{{ now() }}</td>
                    <td>200</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $urls->links('pagination::bootstrap-5') }}

</div>
@endsection
