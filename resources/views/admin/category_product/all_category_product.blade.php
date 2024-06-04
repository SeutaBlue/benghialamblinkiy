@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
                    <?php
                        $message = Session::get('message'); // hàm get để lấy biến có tên là 'message' ở bên AdminController
                        if($message){ // neu ton tai message
                            echo '<span class="text-alert">'.$message.'</span>' ; // in ra tin nhan
                            Session::put('message',null); //cho hien thi 1 lan thoi
                        }
                    ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên danh mục</th>
              <th>Hiển thị</th>
              <th>Ngày thêm</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_category_product as $key => $cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$cate_pro->category_name }}</td>
              <td>
                <span class="text-ellipsis">
                  @if($cate_pro->category_status == 1) 
                    <i style="color:green; cursor: pointer" class="fa-solid fa-eye update-cate-pro-status" data-id="{{$cate_pro->category_id}}" data-status="0"></i>          
                  @else 
                    <i style="color:red; cursor: pointer" class="fa-solid fa-eye-slash update-cate-pro-status" data-id="{{$cate_pro->category_id}}" data-status="1"></i>          
                  @endif
                </span></td>
              <td>
                <a href="{{ URL::to('/edit-category-product/'.$cate_pro->category_id) }}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a><br>
                <a onclick="return confirm('Bạn có chắc là muốn XÓA danh mục sản phẩm này không?')" href="{{ URL::to('/delete-category-product/'.$cate_pro->category_id) }}" class="active styling-edit" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script>
    $(document).ready(function(){
        $('.update-cate-pro-status').click(function(event){
            event.preventDefault();
            var cateproId = $(this).data('id'); // lấy ID bài viết
            var cateproStatus = $(this).data('status'); // lấy trạng thái mới
            var element = $(this);
            $.ajax({
                url: "{{ url('/update-cate-product-status') }}", // đường dẫn tới route xử lý cập nhật
                method: 'GET',
                data:{product_id: cateproId, product_status: cateproStatus},
                success:function(data){              
                    if(cateproStatus == 1) {
                      element.removeClass('fa-eye-slash').addClass('fa-eye').css('color', 'green').data('status', 0);
                      Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Hiển thị danh mục sản phẩm thành công!'
                      });
                    } 
                    else {
                      element.removeClass('fa-eye').addClass('fa-eye-slash').css('color', 'red').data('status', 1);
                      Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Ẩn danh mục sản phẩm thành công!'
                      });
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  console.log('AJAX call failed: ' + textStatus + ', ' + errorThrown);
                }
            });
        });
    });
    </script>
    
@endsection