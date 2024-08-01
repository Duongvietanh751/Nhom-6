@extends('layouts.admins')
@section('title')
    Danh sách đơn hàng
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh Sách</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                        <li class="breadcrumb-item active">Danh sách Đơn Hàng</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:30px">
                            {{session('error')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                            </button>
                        </div>
                    @endif
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh Sách ĐƠn Hàng</h5>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listDonhang as  $item )
                            <tr>
                               <td>
                                <a href="{{route('admins.donhangs.show',$item->id)}}" class="btn btn-info">
                                    {{$item->ma_don_hang}}
                                </a>
                               </td>
                               <td>
                                {{$item->created_at->format('d-m-y')}}
                               </td>
                              
                               <td>
                                {{$item->tong_tien}}
                               </td>
                               <td>
                                    <form action="{{route('admins.donhangs.update',$item->id)}}" method="POST" >
                                        @csrf
                                        @method('PUT')
                                        <select name="trang_thai_don_hang" id="" class="form-select w-75" onchange="confirmSubmit(this)" data-default-value='{{$item->trang_thai_don_hang}}'>
                                            @foreach ($trangThaiDonHang as $key => $value)
                                                <option value="{{$key}}" {{$key == $item->trang_thai_don_hang ? 'selected' : ''}}
                                                    {{$key == $type_huy_don_hang  ? 'disabled' : ''}}
                                                     >{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                               </td>
                               <td>
                                    <a href="{{route('admins.donhangs.show',$item->id)}}" class="btn btn-info">
                                        View
                                    </a>
                                    @if ($item->trang_thai_don_hang === $type_huy_don_hang )
                                    <form action="{{route('admins.donhangs.destroy',$item->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn hủy đơn hàng không ?')">Xóa</button>
                                    </form>
                                    @endif
                               </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection
@section('js')
    <script>
        function confirmSubmit(selectElement){
            var form = selectElement.form;
            var selectedOption =selectElement.options[selectElement.selectedIndex].text;

            var defaultValue = selectElement.getAttribute('data-default-value');

            if(confirm('Bạn có chắc thay đổi trạng thái thành "' + selectedOption + '"không?')){
                form.submit();
            }else{
                selectElement.value = defaultValue;
            }
        }
    </script>
@endsection