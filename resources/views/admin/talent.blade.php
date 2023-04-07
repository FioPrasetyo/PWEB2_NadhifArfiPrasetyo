@extends('layout.main-layout')

@section('head')

@section('content')


 <div class="pagetitle">
      <h1>Form Input Talent</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item">Kelola Data</li>
          <li class="breadcrumb-item active">Input Talent</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form action='/simpantalent' method='post'>
                @csrf
                <div class="row mb-12">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="string" class="form-control" name="username" id="username" value= {{ Session::get('username') }}>
                  </div>
                </div>
                <div class="row mb-12">
                  <label for="followers" class="col-sm-2 col-form-label">Followers</label>
                  <div class="col-sm-10">
                    <input type="integer" class="form-control" name="followers" id="followers" value= {{ Session::get('followers') }}>
                  </div>
                </div>
                <div class="row mb-12">
                  <label for="notelfon" class="col-sm-2 col-form-label">No Telfon</label>
                  <div class="col-sm-10">
                    <input type="string" class="form-control" name="notelfon" id="notelfon" value= {{ Session::get('notelfon') }}>
                  </div>
                </div>
                <div class="row mb-12">
                  <label for="ratecard" class="col-sm-2 col-form-label">RateCard</label>
                  <div class="col-sm-10">
                    <input type="string" class="form-control" name="ratecard" id="ratecard" value= {{ Session::get('ratecard') }}>
                  </div>
                </div>

                <div class="row mb-12">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" href='/admin/database'>Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection