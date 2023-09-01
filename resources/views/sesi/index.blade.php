

@extends('ruangan/layoutt')


@section('konten')
  <!-- Konten Anda -->

  <div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                  <style>
.card-header {
  background-color: blue;
  color: white; /* Optional: Untuk mengubah warna teks menjadi putih */
}

                    </style>
                    <h4>LOGIN SURAT MASUK</h4>
                </div>
                <div class="card-body">

            <ul class="nav nav-pills">
             <!-- <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Scan QR</a></li> -->
              <li class="nav-item"><a href="/sesi/registrasi" class="nav-link active" aria-current="page"> Registrasi</a></li>

            </ul>
            
          </header>
        <!--<center><h1>Login</h1></center>-->
             <form action="/sesi/login" method="POST">
                @csrf

                    
                <div class="smb-3">
                    <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                        <input type="password" value="{{ Session::get('password') }}"  name="password" class="form-control">
                </div>
                
                <div class="d-inline">
                    <button name="submit" type="submit" class="btn 
                     btn-primary">Login</button>
                </div>
            
            </form>
                 
                  <div class="d-flex justify-content-evenly">
                    <img src="{{ asset('k.png') }}" alt="Wawan" width="150">


                  </div>
                  </div>

                @endsection
                