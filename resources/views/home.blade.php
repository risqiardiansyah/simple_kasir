@extends('layouts.head')

@section('content')

<nav class="navbar navbar-expand-lg navbar-secondary shadow-sm">
    <div class="container">
        <div class="row">
            <ul class="navbar-nav">
            <li class="nav-item mr-lg-5" style="border-bottom: 2px solid #6777ef;">
                <a class="nav-link" href="/">Food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaksi">Transaksi</a>
            </li>
        </ul>
        </div>
        
    </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<p class="mt-3 mb-3">Tambahkan Menu Makanan Yang Ada Di Resto</p>
			<div class="card">

			  <div class="card-body">
			  	<div class="col-lg-12">
			  		<a href="/tambah" class="btn btn-primary mb-4">+ Tambah Makanan</a>

			    <table class="table table-borderless table-striped">
				  <thead class="bg-light">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col" colspan="2">Nama</th>
				      <th scope="col">Foto</th>
				      <th scope="col">Harga</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($data as $d)
				    <tr>
				      <th scope="row">{{$loop->iteration}}</th>
				      <td colspan="2">{{$d->nama}}</td>
				      <td>
				      	<img src="{{ URL::to('/').'/foto/'.$d->foto }}" style="width: 100px">
				      </td>
				      <td>{{$d->harga}}</td>
				    </tr>
				    @endforeach

				  </tbody>
				</table>	
			  	</div>
			  	
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection