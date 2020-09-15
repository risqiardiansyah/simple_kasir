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
			<div class="card mt-4">

				<div class="card-body">
				  	<div class="col-lg-12">
				  		<p class="text-primary">Tambah Menu Makanan</p>
					    <form action="/proses_tambah" method="post" enctype="multipart/form-data">
					    	@csrf

						  	<div class="form-group">
							    <label for="namaMenu">Nama Menu</label>
							    <input type="text" class="form-control" id="namaMenu" name="nama" autocomplete="off" required>
							    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						  	</div>

							<div class="form-group">
	                           	<label>Foto</label>
	                            <div class="dropify-wrapper">
	                             	<div class="dropify-message">
	                             		<span class="file-icon"></span>
	                             		<p>Drag and drop a file here or click</p>
	                             		<p class="dropify-error">Ooops, something wrong appended.</p>
	                             	</div>
	                             	<div class="dropify-loader" style="display: none;"></div>
	                             	<div class="dropify-errors-container">
	                             		<ul></ul>
	                             	</div>
		                             	<input type="file" class="dropify form-control" name="image" required>
		                             	@error('image')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                             	<button type="button" class="dropify-clear">Remove</button>
	                             	<div class="dropify-preview" style="display: none;">
	                             		<span class="dropify-render"></span>
	                             		<div class="dropify-infos">
	                             			<div class="dropify-infos-inner">
	                             				<p class="dropify-filename">
	                             					<span class="file-icon"></span><span class="dropify-filename-inner">1.png</span>
	                             				</p>
	                             				<p class="dropify-infos-message">Drag and drop or click to replace</p>
	                             			</div>
	                             		</div>
	                             	</div>
	                            </div>
	                            <p class="na">No File Selected</p><img src="#" id="bleh" width="100px;" hidden>
                            </div>

                            <div class="form-group">
                            	<label>Harga Menu</label>
							    	<div class="input-group mb-2">
								        <div class="input-group-prepend">
								          <div class="input-group-text bg-primary text-light">Rp.</div>
								        </div>
							        	<input type="number" class="form-control" id="harga" oninput="ribu()" name="harga" required="">
							        	@error('harga')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
							      	</div>
							      	<p class="text-sm text-secondary" id="aa">Rp. 0</p>
                            </div>

                            <button type="submit" class="btn btn-success float-right">Simpan</button>
						</form>
				  	</div>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection