@extends('layouts.head')

@section('content')

<nav class="navbar navbar-expand-lg navbar-secondary shadow-sm">
    <div class="container">
        <div class="row">
            <ul class="navbar-nav">
            <li class="nav-item mr-lg-5" >
                <a class="nav-link" href="/">Food</a>
            </li>
            <li class="nav-item" style="border-bottom: 2px solid #6777ef;">
                <a class="nav-link" href="/transaksi">Transaksi</a>
            </li>
        </ul>
        </div>
        
    </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row text-center">
				@foreach($data as $d)
				<div class="col-12 col-md-6 col-lg-4 mt-5" id="makanan{{$d->id}}" onclick="tambahCart({{$d->id}},'{{$d->foto}}','{{$d->nama}}',{{$d->harga}})">
					<div class="card" style="width: 12rem;">
					  <img src="{{ URL::to('/').'/foto/'.$d->foto }}" class="card-img-top" alt="..." style="max-height: 100px;">
					  <div class="card-body">
					    <h5 class="card-title">{{$d->nama}}</h5>
					    <p class="card-text">Rp. {{ number_format($d->harga,2,',','.') }}</p>
					  </div>
					</div>
				</div>
				@endforeach

			</div>
		</div>

		<div class="col-md-4">
			<div class="row">

				<div class="col-12 col-md-6 col-lg-4 mt-5">
					<div class="card" style="width: 22rem;">
					  <div class="card-body">
					    <h5 class="card-title text-center"><i class="fas fa-user"></i> Pesanan</h5>
					    
					    <table class="table table-borderless" align="center">
						  <tbody style="font-size: 12px;" id="pesanan">
						  	<tr></tr>

						    {{-- PESANAN --}}

						  </tbody>
						  {{-- <tbody id="listPesanan">
						  	
						  </tbody>
 --}}						</table>

							<button class="btn btn-outline-danger btn-sm col-12" onclick="clear_cart()">Clear Cart</button>
							<div class="clearfix mt-2 mb-2">
								<button class="btn btn-success btn-sm col-5 float-left" onclick="saveBill()">Save Bill</button>
								<button class="btn btn-success btn-sm col-5 float-right" onclick="printa()">Print Bill</a>
							</div>
							<button class="btn btn-primary btn-sm col-12" id="charge" data-toggle="modal" data-target="#modal_detail" onclick="tampil_pesanan()">Charge </button>
						
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-borderless">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Harga</th>
                      </tr>
                    </thead>
                    <tbody id="listPesanan">
                    	{{-- List Pesanan --}}
			    	</tbody>
                </table>
            </div>
            <div class="col-md-4 border-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <h6 id="total_uang">Uang Pembeli Rp. 0</h6>
                            <input type="number" min="1000" id="pay" class="form-control form-control-sm" oninput="uang_pembeli()">
                        </div>
                    </div>
                    <div class="col-12">
                    	<button type="button" class="btn btn-outline-secondary btn-sm col-5" data-dismiss="modal">Close</button>
        				<button type="button" class="btn btn-primary btn-sm float-right col-5" onclick="pay()">Pay</button>
                    </div>
                    <div class="col-md-12">
                    	<br>
                        <h6 id="kembalian" class="text-danger">Kembalian : </h6>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	let arr = [[0,0,0,,]];
	var total_all = 0;
	var uang_all = 0;
    
    function ribu2(bilangan) {
        if (bilangan != 0 && bilangan != null) {
            var reverse = bilangan.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
        
            return ribuan
        }else{
            return '0';
        }
    }

	function tampil_pesanan() {
		let html;
		let charge;
		let total = 0;
		for (var i = 1; i < arr.length; i++) {
			if (arr[i][0] != 0) {
				html += 
					'<tr>'+
				    	'<td>'+
				    		'<img src="/foto/'+arr[i][1]+'" class="card-img-top" alt="..." style="width: 80px;">'+
				    	'</td>'+
				      	'<td align="center">'+arr[i][2]+'</td>'+
				      	'<td>x'+arr[i][4]+'</td>'+
				      	'<td class="text-primary">Rp. '+ribu2(arr[i][3])+'</td>'+
				    '</tr>';
				charge += 
					'<tr>'+
						'<td>'+i+'</td>'+
						'<td>'+arr[i][2]+' x'+arr[i][4]+'</td>'+
				    	'<td>'+
				    		'<img src="/foto/'+arr[i][1]+'" class="card-img-top" alt="..." style="width: 80px;">'+
				    	'</td>'+
				      	'<td class="text-primary">Rp. '+ribu2(arr[i][3])+'</td>'+
				    '</tr>';
			}
		}
		for (var i = 1; i < arr.length; i++) {
			total += (Number(arr[i][3])*Number(arr[i][4]));
		}
		total_all = total;
		document.getElementById('pesanan').innerHTML = html;
		document.getElementById('charge').innerHTML = 'Charge Rp. '+ribu2(total);

		document.getElementById('listPesanan').innerHTML = charge;
		return total;
	}

	function uang_pembeli() {
		let total = 0;
		let kembali;
		var uang = document.getElementById('pay').value;
		document.getElementById('total_uang').innerHTML = 'Uang Pembeli Rp. '+ribu2(uang);

		for (var i = 1; i < arr.length; i++) {
			total += (Number(arr[i][3])*Number(arr[i][4]));
			uang_all = uang;
		}

		kembali = (Number(uang)-total);
		if (total >= uang) {
			return document.getElementById('kembalian').innerHTML = 'Kembalian Rp. 0';
		}
		if(total < uang){
			return document.getElementById('kembalian').innerHTML = 'Kembalian Rp. '+ribu2(kembali);
		}
		
	}

	function saveBill() {
		swal("Berhasil","Data Berhasil Disimpan","success");
	}

	function tambahCart(id,foto,nama,harga) {
		var result;
		arr.push([id,foto,nama,harga,1])
		if (arr.length != 0) {
			for (var i = 0; i < arr.length; i++) {
				console.log(parseInt(arr[i][0])+'-'+parseInt(id));
				
				if(parseInt(arr[i][0]) != parseInt(id)){
					
					result = console.table(arr);
					console.log("tidak sama");
				}
				document.getElementById('makanan'+id).setAttribute('onclick','tambahJumlah('+parseInt(i)+','+id+')');
			}
			tampil_pesanan();
			return result;
			
		}
	}

	function tambahJumlah(i,id) {
		var result;
		if (parseInt(arr[i][0]) == parseInt(id)) {
			arr[i][4] = parseInt(arr[i][4])+1;
			console.table(arr);
			result = console.log('sama');
		}
		tampil_pesanan();
		return result;
	}

	function clear_cart() {
		if (arr.length > 1) {
			swal({
				title: "Konfirmasi !",
				text: "Anda Yakin Ingin Menghapus Cart?",
			  	icon: "warning",
			  	buttons: true,
			  	dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	arr = [[0,0,0,0,0]];
				tampil_pesanan();
			    swal("Data Cart Dihapus", {
			      icon: "success",
			      buttons: false
			    });
			    location.reload();
			  } else {
			    null;
			  }
			});
		}else{
			swal("Upss !!","Harus Memilih Makanan Terlebih dahulu !!","error");
		}
	}

	function printa() {
		if (arr.length > 1) {
			printJS('pesanan', 'html')
		}else{
			swal("Upss !!","Harus Memilih Makanan Terlebih dahulu !!","error");
		}
	}
	function pay() {
		if (total_all > uang_all) {
			swal({
				title: "Upss !",
				text: "Uang Yang Dibayarkan harus lebih besar !!",
			  	icon: "error",
			});
		}
		if (total_all < uang_all || total_all == uang_all) {	
			swal({
				title: "Berhasil !",
				text: "Terima Kasih Telah Berbelanja Di Toko Kami",
			  	icon: "success",
			  	buttons: false,
			});
			location.reload();
		}
	}
</script>
@endsection