@extends('backend.layouts.base')
@section('title', trans('Titulos.PerfilStud') )
@section('content')
    <div class="col-md-12">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.save') }}">
            <input type="hidden" value="{{$personal->id}}" id="personal_id" class="form-control">
            <input type="hidden" value="{{$user->id}}" id="user_id" class="form-control">
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-divider">
                    {{trans('users.text.create_title')}}
                    <span class="panel-subtitle">
                        {{trans('users.text.create_subtitle') }}
                    </span>
                </div>
                <div class="panel-body">

                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('users.text.email')}}</label>
                        <div class="col-6">
                            <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                   value="{{$user->email}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('users.text.password')}}</label>
                        <div class="col-6">
                            <input type="password" placeholder="{{trans('users.placeholder.password')}}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('users.placeholder.type')}}</label>
                        <div class="col-6">
                            <input type="text" placeholder="{{trans('users.placeholder.type')}}" value="{{$user->type}}"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading panel-heading-divider">
                    {{trans('personal.text.create_title')}}
                    <span class="panel-subtitle">
                        {{trans('personal.text.create_subtitle') }}
                    </span>
                </div>
                <div class="panel-body">

                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('personal.text.name')}}</label>
                        <div class="col-6">
                            <input type="text" placeholder="{{trans('personal.placeholder.name')}}"
                                   value="{{$personal->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('personal.text.lastname')}}</label>
                        <div class="col-6">
                            <input type="text" placeholder="{{trans('personal.placeholder.lastname')}}"
                                   value="{{$personal->lastname}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('personal.text.country')}}</label>
                        <div class="col-6">
                            <input type="text" placeholder="{{trans('personal.placeholder.country')}}"
                                   value="{{$personal->country}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('personal.text.state')}}</label>
                        <div class="col-6">
                            <input type="text" placeholder="{{trans('personal.placeholder.state')}}"
                                   value="{{$personal->state}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('personal.text.city')}}</label>
                        <div class="col-6">
                            <input type="text" placeholder="{{trans('personal.placeholder.city')}}"
                                   value="{{$personal->city}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">{{trans('personal.text.phone')}}</label>
                        <div class="col-6">
                            <input type="tel" placeholder="{{trans('personal.placeholder.phone')}}"
                                   value="{{$personal->phone}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
