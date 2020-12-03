@extends('layouts.master')
@section('title', 'şirket yönetimi')
@section('content')
    <h1 class="page-header">Şirket Yönetimi</h1>

    <form method="post" action="{{ route('company.kaydet', $entry->id) }}">
        {{ csrf_field() }}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>
        <h3 class="sub-header">
            Şirket {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h3>

        @include('layouts.partials.alert')
        @include('layouts.partials.errors')



        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Şirket ismi</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="şirket ismi" value="{{ $entry->company_name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="website">Web adresi</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="web site" value="{{ $entry->website}}">
                </div>
            </div>
        </div>



    </form>
@endsection

