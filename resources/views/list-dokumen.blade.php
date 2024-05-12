@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
            <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
            <a class="nav-link active" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
            <a class="nav-link" id="v-pills-settings-tab" href="{{ route('kategori-dokumen') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Kategori Dokumen</a>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                <h3 style="margin-left:200px; test-align:center">List Dokumen</h3>

                <table class="table" style="margin-left:200px">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Dokumen</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">File</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $index => $document)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $document->judul_dokumen }}</td>
                            <td>{{ $document->deskripsi_dokumen }}</td>
                            <td>{{ $document->kategori_dokumen }}</td>
                            <td>{{ $document->tanggal_dokumen}}</td>
                            <td>{{ $document->dokumen_file}}</td>
                            <td>{{ $document->tags}}</td>
                            <td>{{ $document->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
        </div>
    </div>
</div>
@endsection
