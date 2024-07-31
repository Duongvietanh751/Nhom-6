@component('mail::message')
    #Xác nhận đơn hàng

    Xin Chào{{$donHang->ten_nguoi_nhan}},
    Thank You bạn đã ủng hộ cửa hàng của chúng tôi . Đây là thông tin đơn hàng của bạn
    *** Mã đơn hàng *** {{$donHang->ma_don_hang}}

    ***SẢn phẩm đã đặt : ***
    @foreach ($donHang->chiTietDonHang as $chiTiet)
        - {{$chiTiet->sanPham->ten_san_pham}} x {{$chiTiet->so_luong}}: {{number_format($chiTiet->thanh_tien)}} VND
    @endforeach

    ***Tổng Tiền: *** {{number_format($chiTiet->tong_tien)}} VND

    Chúng tôi sẽ liên hệ với bạn sớm nhát để xác nhận thông tin giao hàng
    Cảm ơn bạn đã ủng hộ shop tôi ! 
    Trân trọng !
@endcomponent