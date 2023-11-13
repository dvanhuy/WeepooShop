<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    <link rel="stylesheet" href="{{ asset('css/add_figure.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    @include('header')
    <div class="header_main">
        <a href="">
            <div class="header_name_title">
                <i class="fa-solid fa-house"></i>
                <span>Trang chủ</span> 
            </div>
        </a>
        <a href="">
            <div class="header_name_titlesub">
                <i class="fa-solid fa-house"></i>
                <span>Quản lý mô hình</span> 
            </div>
        </a>
        <a href="">
            <div class="header_name_titlesub">
                <i class="fa-solid fa-house"></i>
                <span>Thêm mô hình</span> 
            </div>
        </a>
    </div>
    
    <form action="">
        <div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Image_of_none.svg/1200px-Image_of_none.svg.png">
                </div>
                <label>Tệp ảnh của bạn
                    <input type="file" name="myImage" accept="image/png, image/gif, image/jpeg" />
                </label>
            </div>

            <div class="right">
                <label for="ten">Tên mô hình :
                    <input type="text" name="ten" id="ten">
                </label>
                <label for="nha_sx">Nhà sản xuất :
                    <input type="text" name="nha_sx" id="nha_sx">
                </label>
                
                <div class="numberinfo">
                    <label for="so_luong_da_ban">Đã bán : 
                        <input type="text" name="so_luong_da_ban" id="so_luong_da_ban">
                    </label>
                    <label for="so_luong_hien_con">Hiện còn : 
                        <input type="text" name="so_luong_hien_con" id="so_luong_hien_con">
                    </label>
                </div>

                <label for="gia">Giá :
                        <input type="text" name="gia" id="gia">
                    VNĐ
                </label>
                <div class="size">
                    <div class="size-title">Kích thước :</div>
                    <label for="chieu_cao">Cao : 
                        <input type="text" name="chieu_cao" id="chieu_cao">cm
                    </label>
                    <div class="area">
                        <label for="chieu_dai">Dài : 
                            <input type="text" name="chieu_dai" id="chieu_dai">cm
                        </label>
                        <label for="chieu_rong">× Rộng : 
                            <input type="text" name="chieu_rong" id="chieu_rong">cm
                        </label>
                    </div>
                </div>
                <label for="mo_ta">Mô tả : 
                </label>
                <textarea spellcheck="false" type="" id="mo_ta"></textarea>
                <button class="buttonAdd">Thêm</button>
            </div>
        </div>
    </form>
</body>
</html>