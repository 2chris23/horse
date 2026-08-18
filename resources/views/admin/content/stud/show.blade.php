@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )
@section('topcss')

@endsection
@section('pagetitleadmin')

    @include('admin.topstud')

@endsection
@section('content')


    <div id="datos1" class="card col-12">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.text.create_title') !!} "{!! $stud->getName() !!}"
            </div>
            {{--
            <form class="row" id="yeguadas" enctype="multipart/form-data">
                <input type="hidden" name="stud_id" value="{!! $stud->id !!}">
                @include('admin.topstud')

            </form>
            --}}
        </div>
    </div>


@endsection

@section('bottomjs')
    <script>
        function none(url) {
            if (url !== undefined) {
                window.location.assign(url);
            }
            console.log('click');
        }
    </script>

@endsection

