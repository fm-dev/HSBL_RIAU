@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
	<div class="main-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Kompetisi</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item">
						</li>
						<li class="breadcrumb-item active" aria-current="page">Data Kompetisi</li>
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
							<div class="mt-2 mb-2">
								<a href="/admin/kompetisi/create" class="btn btn-primary">Tambah Kompetisi</a>
							</div>
							<div class="table-responsive">
								<table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Kompetisi</th>
											<th>Season</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($listKompetisi as $item)
										<tr>
											<td>{{$item['id']}}</td>
											<td>{{$item['name']}}</td>
											<td>{{$item['seasonName']}}</td>
											<td>
												<a href="{{ url('/admin/kompetisi/delete/' . $item['id']) }}" class="btn btn-danger">Delete</a>
											</td>
										</tr>
										@endforeach
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