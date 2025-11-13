@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Team</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item">
								</li>
								<li class="breadcrumb-item active" aria-current="page">List Data Team</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
     
        <div class="row">
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row ">
					 <div class = "d-flex flex-xl-row gap-3">
                        <div class="col-3">
                            <label for="user" class="form-label">Seasons</label>
                             <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="user" class="form-label">Kompetisi</label>
                             <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="user" class="form-label">Series</label>
                             <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                       
                       
                     </div>	
                     <div>
                        <div class="mt-3">
                            <label for="user" class="form-label">Status Team</label>
                             <select class="form-select" aria-label="Default select example">
                                <option selected>All</option>
                                <option value="1">Sudah verifikasi</option>
                                <option value="2">belum verifikasi</option>
                                <option value="3">Blacklist</option>
                            </select>
                        </div>
                     </div>
                     <div>
                        <button class="mt-2 btn btn-primary">Cari</button>
                     </div>
                </div><!--end row-->
              </div>
            </div>
          </div>
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row ">
                    <div class="table-responsive">
							<table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Sekolah</th>
										<th>Nama Team</th>
										<th>Kompetisi</th>
										<th>Leader</th>
										<th>Verif Data</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2025110201</td>
										<td>SMK 2 PEKANBARU</td>
										<td>LONTONG MALAM</td>
										<td>HSBL 2025 HONDA</td>
										<td>KHARIUL FIKRI</td>
										<td>
                                            <span class="badge bg-success">verifikasi</span>
                                        </td>
										<td>
                                            <div class="d-flex gap-2">
                                                 <button type="button" class="btn btn-primary raised d-flex gap-2">Detail</button>
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td>2025110201</td>
										<td>SMK 2 PEKANBARU</td>
										<td>LONTONG MALAM</td>
										<td>HSBL 2025 HONDA</td>
										<td>KHARIUL FIKRI</td>
										<td>
                                            <span class="badge bg-warning">Belum verifikasi</span>
                                        </td>
										<td>
                                            <div class="d-flex gap-2">
                                                 <button type="button" class="btn btn-primary raised d-flex gap-2">Detail</button>
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td>2025110201</td>
										<td>SMK 2 PEKANBARU</td>
										<td>LONTONG MALAM</td>
										<td>HSBL 2025 HONDA</td>
										<td>KHARIUL FIKRI</td>
										<td>
                                            <span class="badge bg-secondary">Blacklist</span>
                                        </td>
										<td>
                                            <div class="d-flex gap-2">
                                                 <button type="button" class="btn btn-primary raised d-flex gap-2">Detail</button>
                                            </div>
                                        </td>
									</tr>
								</tbody>
							</table>
						</div>
                </div><!--end row-->
              </div>
            </div>
          </div>
          
        </div>



    </div>
  </main>
  <!--end main wrapper-->
@endsection
