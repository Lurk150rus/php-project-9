@extends('layouts.app')
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
                <tr>
                    <td>
                        {{ $url?->id }}
                    </td>
                    <td>{{ $url?->name }}</td>
                    <td>{{ now() }}</td>
                    <td>200</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <a class="btn" href="{{ route('urls.index') }}"> <-- Назад к списку </a>
    </div>
</div>
@endsection
