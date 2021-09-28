@extends('admin.layout')
@section('content')
 <!-- col-xl-6 -->

	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="{{route('category-manager.create')}}" class="btn btn-pill btn-success btn-add"><i class="fas fa-plus-circle"></i> Thêm</a>
				<a href="" class="btn btn-pill btn-danger btn-add"><i class="far fa-trash-alt"></i> Xóa</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered ">
					<thead>
						<tr>
							<th class="center">#</th>
							<!-- <th >STT</th> -->
							<th class="center w-500px">Tên</th>
							<th class="center w-100px">Nổi bật</th>
							<th class="center w-100px">Hiển thị</th>
							<th class="center w-100px">Trạng thái</th>
							<th class="center w-300px">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0; ?>
						@foreach($Categorys as $key => $Category)
						<?php $i++; ?>
						<tr>
							
								<td  class="center">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									</div>
								</td>
	<!-- 						<td  class="center">
									{{$i}}
								</td> -->
								<td class="center">
									{{$Category->tenvi}}
								</td>
								<td class="center w-100px">
									<div class="form-check">
									  <input  class="form-check-input checknb"  type="checkbox" value="" id="" data-id="{{$Category->id}}"  {{ ($Category->noibat == 1) ? "checked" : '' }}>
									</div>
								</td>
								<td class="center w-100px">
									<div class="form-check">
									  <input class="form-check-input checkht"  type="checkbox" value="" id="" data-id="{{$Category->id}}" {{ ($Category->hienthi == 1) ? "checked" : '' }}>
									</div>
								</td>
								<td class="center w-100px">
									<div class="form-check form-switch">
									  <input class="form-check-input checktt"  type="checkbox" id="" data-id="{{$Category->id}}" {{ ($Category->trangthai == 1) ? "checked" : '' }}>
									</div>
								</td>
							<form>
								@csrf
								<td class="center w-100px">
									<a href="{{route('category-manager.edit',$Category->id)}}" class="btn btn-danger"><i class="far fa-edit"></i></a>
									<button type="button" class="btn btn-primary btn-del-cat"  data-id="{{$Category->id}}"><i class="fas fa-trash-alt"></i></button>
								</td>
							</form>
						</tr>
						@endforeach
					</tbody>

				</table>
				<div class="paginate-styling">
					{{ $Categorys->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script_function')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.btn-del-cat').click(function(){
				const id = $(this).data('id');
				const _token  = $('input[name="_token"]').val();
				// alert(_token)
				swal({
					  title: "Bạn có chắc chắn xóa",
					  text: "Sau khi xóa không thể khôi phục nhé",
					  type: "warning",
					  showCancelButton: true,
					  confirmButtonClass: "btn-danger",
					  confirmButtonText: "Yes, xóa",
					  closeOnConfirm: false,
				},
			    function(isConfirm){
			        if(isConfirm){
			            $.ajax({
							url:window.route('category-manager.destroy', id),
							method:'DELETE',
							data:{id:id,_token:_token},
							success:function(data){
								if(data == '1'){
				  					swal("Deleted!", "Xóa thành công.", "success");
				  					window.setTimeout(function(){
				  						location.reload();
				  					},3000);
			                    }
			                    else if(data == '0'){
				  					swal("Deleted!", "Đã có danh mục cấp 2, không thể xóa !", "error");
			                    }
			                }
			            }) 
			        }
			    });
			})
			$('.checknb').click(function(){
				const id = $(this).data('id');
				const _token  = $('input[name="_token"]').val();
				let checknb = 0;
				if(!$(this).prop('checked') ? checknb=1 : checknb=0);
				$.ajax({
					url:window.route('category-manager.update', [id]),
					method:'PUT',
					data:{checknb:checknb,_token:_token,id:id},
					success:function(data){

					}
				})
			})
			$('.checkht').click(function(){
				const id = $(this).data('id');
				const _token  = $('input[name="_token"]').val();
				let checkht = 0;
				if(!$(this).prop('checked') ? checkht=1 : checkht=0);
				$.ajax({
					url:window.route('category-manager.update', [id]),
					method:'PUT',
					data:{checkht:checkht,_token:_token,id:id},
					success:function(data){

					}
				})
			})
			$('.checktt').click(function(){
				const id = $(this).data('id');
				const _token  = $('input[name="_token"]').val();
				let checktt = 0;
				if(!$(this).prop('checked') ? checktt=1 : checktt=0);
				$.ajax({
					url:window.route('category-manager.update', [id]),
					method:'PUT',
					data:{checktt:checktt,_token:_token,id:id},
					success:function(data){

					}
				})
			})
		})
	</script>
@endsection