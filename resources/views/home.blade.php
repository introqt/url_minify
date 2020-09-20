@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Links</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (count($urls) > 0)
                            <table class="table">
                                <tr>
                                    <td>Short url</td>
                                    <td>Transitions</td>
                                    <td>Expires at</td>
                                </tr>
                                @foreach($urls as $url)
                                    <tr>
                                        <td>
                                            <a href="{{ url($url->short_url) }}">
                                                {{ url($url->short_url) }}
                                            </a>
                                        </td>
                                        <td>{{ $url->transitions }}</td>
                                        <td>{{ $url->expires_at }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h2>No links shortened yet!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
