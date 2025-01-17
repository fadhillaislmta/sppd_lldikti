@extends('layout.v_template')

@section('main-content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Data Surat Undangan dari Kantor') }}</h1>

 <a href="/kantor/add" class="btn btn-primary mb-3">Tambah Surat</a>
    
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

<table id="table" class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Karyawan</th>
                <th>Judul Surat</th>
                <th>Tanggal Pergi</th>
                <th>Tanggal Pulang</th>
                <th>Lampiran Surat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kantors as $kantor)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $kantor->nama_kota}}</td>
                    <td>
                        @foreach($kantor->karyawan as $detailkantor) 
                        <p>{{$detailkantor->nama}}</p>
                        @endforeach
                    </td>
                    <td>{{ $kantor->judul_surat}}</td>
                    <td>{{ $kantor->tanggal_pergi}}</td>    
                    <td>{{ $kantor->tanggal_pulang}}</td>
                    <td>
                        <a href="{{ asset('lampiran_surat/'. $kantor->lampiran_surat )}}" target="_blank" rel="noopener noreferrer"> {{$kantor->lampiran_surat}} </a>
                    </td>
                    
                   
                    <td>
                        <div class="d-flex">
                            <a href="/kantor/edit/{{ $kantor->id }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <a href="{{Route('kantor.destroy',[$kantor->id])}}" display="inline" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                            <!-- <form action="{{Route('pusat.destroy',[$kantor->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Hapus</button> -->
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
            title: "Apakah Anda Yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                icon: "warning",
                buttons: true,
                 dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endpush
@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush

