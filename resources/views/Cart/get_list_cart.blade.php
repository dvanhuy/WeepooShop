<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    <link rel="stylesheet" href="{{ asset('css/get_detail_figure.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <head>
        <nav>
            <div class="logo">Weepoo Shop</div>
            <div class="nav_container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Offers</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <a href="{{ route('cart.index') }}" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </ul>
                <div class="avatar">
                    <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="">
                </div>
            </div>
           
        </nav>
    </head>

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
                <span>Giỏ hàng</span> 
            </div>
        </a>
    </div>

</body>
</html>