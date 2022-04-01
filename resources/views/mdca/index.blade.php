@extends('layouts.theme')
@section('menu-active-emr','active-nav')
@section('header_script')

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

    <?php echo "<pre>";
    print_r($model[2]);
    echo "</pre>";
    ?>

    <div class="card card-style">  
        <div class="content mt-0 mb-0">
            <div class="list-group list-custom-large list-icon-0">
                @foreach($model as $data)
                <a href="{{ route('mdca.show', $data->vn) }}">
                    <i class="fa font-19 fa-stethoscope rounded-s color-green1-dark"></i>
                    <span class="">{{$data->note2}}</span>
                    <strong class="">BBBB</strong>
                    <i class="fa fa-chevron-right opacity-30"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')