@extends('layout.main-layout')

@section('head')

@section('content')

<div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item">Kelola Data</li>
          <li class="breadcrumb-item active">Database</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Table</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Followers</th>
                    <th scope="col">No Telfon</th>
                    <th scope="col">Ratecard</th>
                    @if (Auth::user()->level=='admin')  
                    <th scope="col">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @php($i=1)
                  @foreach ($data as $item)
                  <tr>
                    
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->followers }}</td>
                    <td>{{ $item->notelfon }}</td>
                    <td>{{ $item->ratecard }}</td>
                    @if (Auth::user()->level=='admin')
                    <td>
                        
                      <div class="d-flex justify-between">
                        <a href='/admin/{{ $item->id }}/edit' class="btn btn-secondary bi bi-pen mx-1"></a>
                        <form action="/admin/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" name="submit" class="btn btn-danger bi bi-trash mx-1" > </button>
                        </form>
                      </td>
                    </tr>
                      @endif
                  @endforeach
                    
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection