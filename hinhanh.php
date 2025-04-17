<?php include 'header.php'; ?>
<style>
    body.page-home .pagemain-wrapper{        
        background-size: contain;
        background-attachment: fixed;
        padding-bottom: 1px;
        background-color: #fff;
    }
   .gallery {
        column-count: 2;
        column-gap: 10px;
    }

    .gallery a {
        break-inside: avoid;
        display: inline-block;
        margin-bottom: 10px;
    }

    .gallery img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s;
        border-radius:6px;
    }

    @media (min-width: 768px) {
        .gallery {
            column-count: 4;
        }
        .gallery img {
            min-width: 290px;
        }
    }
    @media (max-width: 767px) {
        .fancybox__container{
        bottom: 50px;
        }
    }
    .fancybox__container
    {
        z-index:9999;
    }
    .gallery img {
        opacity: 0; /* Ẩn ảnh ban đầu */
        transform: translateY(20px); /* Dịch chuyển ảnh xuống dưới một chút */
        transition: opacity 0.6s ease-out, transform 0.6s ease-out; /* Hiệu ứng chuyển đổi */
    }
    .gallery img.show {
        opacity: 1; /* Hiển thị ảnh */
        transform: translateY(0); /* Đưa ảnh về vị trí ban đầu */
    }
</style>
<aside class="clearfix pagemain-wrapper">
        <div class="clearfix" id="bg-main">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/hinh-anh/">Hình Ảnh</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="container wrapper-container storewrapper-container">
            <h1 class="title-page text-red f-title">Hình Ảnh - Video</h1>
            <div class="gallery" id="dvHinhAnh">
                <?php
                    require_once 'connect.php';

                    // Tạo kết nối
                    $db = new Connect();

                    // Truy vấn dữ liệu hình ảnh
                    $sql = "SELECT * FROM hinhanhca ORDER BY idhinh DESC";
                    $imagesTable = $db->getTable($sql);

                    $html = "";

                    if (!empty($imagesTable)) {
                        foreach ($imagesTable as $row) {
                            $url = $row['urlhinh'];
                            $extension = strtolower(pathinfo($url, PATHINFO_EXTENSION));

                            if (in_array($extension, ['mp4', 'avi', 'mov'])) {
                                $html .= "<a href='/$url' data-fancybox='gallery' data-type='video'>
                                            <video controls style='width: 100%; height: auto; border-radius: 6px;'>
                                                <source src='/$url' type='video/mp4'>
                                                Your browser does not support the video tag.
                                            </video>
                                          </a>";
                            } else {
                                $html .= "<a href='/$url' data-fancybox='gallery'>
                                            <img src='/$url' alt='Trại cá giống Ba So'>
                                          </a>";
                            }
                        }
                    }

                    // Hiển thị nội dung HTML
                    echo $html;

                    // Đóng kết nối
                    $db->closeConnection();
                ?>
            </div>
        </div>
    </aside>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const images = document.querySelectorAll('.gallery img');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show'); // Thêm lớp show khi ảnh vào vùng nhìn thấy
                        observer.unobserve(entry.target); // Ngừng quan sát ảnh này sau khi nó xuất hiện
                    }
                });
            });

            images.forEach(image => {
                observer.observe(image); // Bắt đầu quan sát từng ảnh
            });
        });
    </script>
    <?php include 'footer.php'; ?>