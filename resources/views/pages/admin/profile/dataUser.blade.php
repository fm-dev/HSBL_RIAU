@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Users</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item">
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Users</li>
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
                            <label for="user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user" >
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
                    <div class = "mt-2 mb-2">
                        <a  class = "btn btn-primary">Tambah Users</a>
                    </div>
                    <div class="table-responsive">
							<table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Username</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2025110201</td>
										<td>Khairul Fikri</td>
										<td>Khairulfikri@gmail.com</td>
										<td>
                                            <div class="d-flex gap-2">
                                                 <button type="button" class="btn btn-warning raised d-flex gap-2"><i class="fadeIn animated bx bx-comment-edit"></i></button>
                                                 <button type="button" class="btn btn-danger raised d-flex gap-2"><i class="material-icons-outlined">delete</i></button>
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td>2025110201</td>
										<td>Khairul Fikri</td>
										<td>Khairulfikri@gmail.com</td>
										<td>
                                            <div class="d-flex gap-2">
                                                 <button type="button" class="btn btn-warning raised d-flex gap-2"><i class="fadeIn animated bx bx-comment-edit"></i></button>
                                                 <button type="button" class="btn btn-danger raised d-flex gap-2"><i class="material-icons-outlined">delete</i></button>
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
