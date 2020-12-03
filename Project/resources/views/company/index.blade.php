@extends('layouts.master')
@section('title','Şirket')
@section('content')


    <h3 class="sub-header">Şirket Listesi</h3>
   {{--<div class="well">--}}
        <div class="btn-group pull-right">
            <a href="{{ route('company.yeni') }}" class="btn btn-primary">Yeni</a>
        </div>

        <form method="post" action="{{ route('company') }}" class="form-inline">

            {{--

          csrf_field()
          <div class="form-group">
              <label for="aranan">Ara</label>
              <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Şirket Ara..." value="{{ old('aranan') }}">

          </div>
          <button type="submit" class="btn btn-primary">Ara</button>
          <a href="{{ route('company') }}" class="btn btn-primary">Temizle</a>

      --}}
        </form>

   {{--</div>--}}

    {{--@include('layouts.partials.alert')--}}

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>id</th>

                <th>Şirket Adı</th>
                <th>Web adresi</th>
                <th>link</th>
            </tr>
            </thead>
            <tbody>
            @if (count($list) == 0)
                <tr><td colspan="6" class="text-center">Kayıt bulunamadı!</td></tr>
            @endif
            @foreach ($list as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->company_name }}</td>
                    <td>{{ $entry->website }}</td>
                    <td>{{ $entry->web_html }}</td>

                    <td style="width: 100px">
                        <a href="{{ route('company.duzenle', $entry->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{ route('company.sil', $entry->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
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
