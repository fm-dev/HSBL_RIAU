@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Profile</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
     
        <div class="row">
          <div class="col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row ">
                    <form>
                        <div class = "d-flex flex-xl-row flex-column gap-2">
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik">
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="Kabupaten" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" id="Kabupaten">
                                </div>
                            </div>
                        </div>
                        <div class = "d-flex flex-xl-row flex-column gap-2">
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="namadepan" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="namadepan">
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" class="form-control" id="kota">
                                </div>
                            </div>
                        </div>
                        <div class = "d-flex flex-xl-row flex-column gap-2">
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="naamabelakang" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="naamabelakang">
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <input type="text" class="form-control" id="alamat">
                                </div>
                            </div>
                        </div>
                        <div class = "d-flex flex-xl-row flex-column gap-2">
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="gender">
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="telp" class="form-label">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="telp">
                                </div>
                            </div>
                        </div>
                        <div class = "d-flex flex-xl-row flex-column gap-2">
                            <div class="col-12 col-xl-5 col-sm-5">
                                <div class="mb-3">
                                    <label for="tgllhr" class="form-label">Tanggal lahir</label>
                                    <input type="date" class="form-control" id="tgllhr">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div><!--end row-->
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-1">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="rounded-4" src="{{asset('adminSide/assets/images/avatars/02.png')}}" width="200"/>
                </div>
                <div class="mt-3">
                    <input class="form-control" type="file" id="formFile">
                </div>
                <h5 class="mb-0 mt-2 text-center">ID-Card</h5>
                <div class="d-flex justify-content-center">
                    <img class="rounded-4" src="{{asset('adminSide/assets/images/id_card/id-card.png')}}" width="200"/>
                </div>
                <div class="mt-3">
                    <input class="form-control" type="file" id="formFile">
                </div>
              </div>
            </div>
          </div>
        </div>



    </div>
  </main>
  <!--end main wrapper-->
@endsection
