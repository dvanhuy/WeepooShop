<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/get_list_figure.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo">
            Weepoo
        </div>
        <div class="user_avatar">Avatar</div>
    </header>
    <form action="">
        <div class="search_box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Tìm kiếm trên Weepoo shop">
            <input type="submit" value="Tìm kiếm">
        </div>
    </form>
    <main>
        <main>
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
                        <span>Danh sách mô hình</span> 
                    </div>
                </a>
                <a href="">
                    <div class="header_name_titlesub">
                        <i class="fa-solid fa-house"></i>
                        <span>Chi tiết mô hình</span> 
                    </div>
                </a>
                
                <div class="header_name_search">
                    <label for="order">Sắp xếp theo : </label>
                    <select name="order" id="order">
                        <option value="">Giá tăng dần</option>
                        <option value="">Giá giảm dần</option>
                        <option value="">Mới cập nhật</option>
                        <option value="">Cũ nhất</option>
                    </select>
                    <label for="search" id="search_input_lable">Tìm kiếm </label>
                    <input type="text" name="" id="search_input" placeholder="Thiết bị cần tìm kiếm">
                    <button id="button_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
            
            <h2>ten  => {{ $figure->ten }}</h2>
            <h2>gia  => {{ $figure->gia }}</h2>
            <h2>so_luong_hien_con  => {{ $figure->so_luong_hien_con }}</h2>
            <h2>so_luong_da_ban  => {{ $figure->so_luong_da_ban }}</h2>
            <h2>nha_sx  => {{ $figure->nha_sx }}</h2>
            <h2>chieu_cao  => {{ $figure->chieu_cao }}</h2>
            <h2>chieu_rong  => {{ $figure->chieu_rong }}</h2>
            <h2>chieu_dai  => {{ $figure->chieu_dai }}</h2>
            <h2>mo_ta => {{ $figure->mo_ta }}</h2>
            <h2>hinh_anh  => {{ $figure->hinh_anh }}</h2>
        </main>
    </main>
</body>
</html>