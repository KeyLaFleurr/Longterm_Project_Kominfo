
@extends('pendataan/layoutt')
<div class="w-50.center.border.rounded.px-3.py-3.mx-auto">
    


@section('konten')
    <div class="w-50.center.border.rounded.px-3.py-3.mx-auto">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              <span class="fs-4"><h2><strong>Log In pengguna ruangan rapat</strong></h2>
            </span>
            </a>
        
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Scan QR</a></li>
              <li class="nav-item"><a href="/sesi/registrasi" class="nav-link">Registrasi</a></li>

            </ul>
          </header>
        <!--<center><h1>Login</h1></center>-->
             <form action="/sesi/   " method="POST">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                        <input type="password" value="{{ Session::get('password') }}"  name="password" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn
                     btn-primary">Login</button>
             </form>
    </div>
                @endsection