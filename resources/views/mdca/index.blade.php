@extends('layouts.theme')
@section('menu-active-emr','active-nav')
@section('header_script')
{{-- header --}}
@endsection

@section('content')

<div class="page-content header-clear-small">
    <div class="card card-style">
        <div class="d-flex content">
            <div class="flex-grow-1">
                <div>
                    <h1 class="font-700 mb-1">{{ $moduletitle }}</h1>
                    <p class="mb-0 pb-1 pr-3">
                        {{ $model[0]->fullname }}
                    </p>
                </div>
            </div>
            <div>
                <img src="/images/male.jpg" data-src="/images/male.jpg" width="50" class="rounded-circle mt- shadow-xl preload-img">
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')

@endsection