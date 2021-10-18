@extends('layouts.app_admin')

@section('content')
    <div class="card card-cascade narrower">
        <div class="table-responsive">
            <table class="table">
                <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th>Kime Geldi</th>
                    <th>Kimden Geldi</th>
                    <th>Konusu</th>

                    <th>Tarih</th>
                    <th>İşlem</th>

                </tr>
                </thead>
                <tbody>

                @foreach($folders as $folder)
                    @php
                        $messages = $folder->messages()->all()->get();
                     $i=1; @endphp
                    @foreach($messages as $message)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$message->getheader()->get('to')[0]->mail}}</td>
                            <td>{{$message->getheader()->get('from')[0]->mail}}</td>
                            <td>{{$message->getSubject()}}</td>
                            <td>{{$message->getAttributes()["date"]}}</td>
                            <td class="text-right">
                                <a href="?forward=" class="btn btn-sm btn-secondary waves-effect waves-light">{{__('admin_pages.forward_mail')}}</a>
                                <a href="?edit=" class="btn btn-sm btn-secondary waves-effect waves-light">{{__('admin_pages.read_mail')}}</a>
                                <a href="{{lang_url('admin/delete/user/')}}" class="btn btn-sm btn-secondary waves-effect waves-light confirm" data-my-message="{{__('admin_pages.are_u_sure_delete_m')}}">{{__('admin_pages.delete_mail')}}</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
