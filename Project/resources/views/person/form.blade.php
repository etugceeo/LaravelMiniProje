@extends('layouts.master')
@section('title', 'Kişi Yönetimi')
@section('content')
    <h1 class="page-header">Kişi Yönetimi</h1>

    <form method="post" action="{{ route('person.kaydet', $entry->id) }}">
        {{ csrf_field() }}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>
        <h3 class="sub-header">
            Kişi {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h3>

        @include('layouts.partials.alert')
        @include('layouts.partials.errors')



        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Ad</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ad" value="{{ old('name', $entry->name) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="surname">soyad</label>
                    <input type="text" class="form-control" id="name" name="surname" placeholder="soyad" value="{{ old('surname', $entry->surname) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $entry->email) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Ünvan</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="ünvan" value="{{old('title',$entry->title)}}">
                </div>
            </div>
        </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon" value="{{ old('phone', $entry->phone) }}">
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label for="company_id">şirket id</label>
                    <input type="text" class="form-control" id="company_id" name="company_id" placeholder="company_id" value="{{ old('company_id', $entry->company_id) }}">
                </div>
            </div>

    </form>
@endsection
