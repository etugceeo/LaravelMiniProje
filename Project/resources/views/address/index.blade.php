@extends('layouts.master')
@section('title','Adres')
@section('content')
    <h1 class="page-header">Adres Yönetimi</h1>

    <h3 class="sub-header">Adres Listesi</h3>
    <div class="well">
        <div class="btn-group pull-right">
            <a href="{{ route('address.yeni')}}" class="btn btn-primary">Yeni</a>
        </div>
        <form method="post" action="{{ route('address') }}" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Ad, Email Ara..." value="{{ old('aranan') }}">
            </div>
            {{--
            <button type="submit" class="btn btn-primary">Ara</button>
            <a href="{{ route('person') }}" class="btn btn-primary">Temizle</a>
            --}}

        </form>
    </div>



    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Açıklama</th>
                {{--<th>yer/cadde</th>
                <th>cadde\no</th>
                <th>rota</th>--}}
                <th>şehir</th>
                <th>posta kodu</th>
                <th>ülke</th>
                <th>company_id</th>
            </tr>
            </thead>
            <tbody>
            @if (count($list) == 0)
                <tr><td colspan="7" class="text-center">Kayıt bulunamadı!</td></tr>
            @endif
            @foreach ($list as $entry)
                <tr>
                    <td>{{$entry->id}}</td>
                    <td>{{$entry->autocomplete}}</td>
                    {{--<td><td>{{$entry->location_field}}</td>
                    <td>{{$entry->street_number}}</td>
                    {{$entry->route}}</td>--}}}
                    <td>{{$entry->locality}}</td>
                    <td>{{$entry->postal_code}}</td>
                    <td>{{$entry->company_id}}</td>
                    <td style="width: 100px">
                        <a href="{{ route('address.duzenle', $entry->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{ route('address.sil', $entry->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $list->links() }}
    </div>
@endsection
