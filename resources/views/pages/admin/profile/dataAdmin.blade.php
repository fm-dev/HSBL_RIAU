@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Admin</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item">
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Admin</li>
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
                    <div class = "mt-2 mb-2">
                        <a  class = "btn btn-primary">Tambah Admin</a>
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
