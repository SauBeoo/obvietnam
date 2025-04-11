<?php
/**
 * The template for displaying single product posts
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chống thấm Sikaflex Construction | OB Vietnam</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'primary': '#1a56db',
                            'primary-dark': '#1641ac',
                            'secondary': '#f59e0b',
                            'secondary-dark': '#d97706',
                            'accent': '#10b981',
                            'dark': '#1f2937',
                            'light': '#f3f4f6',
                        },
                        fontFamily: {
                            'sans': ['Inter', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

            body {
                font-family: 'Inter', sans-serif;
                background-color: #f9fafb;
            }

            .product-feature {
                @apply flex items-start mb-3;
            }

            .product-feature i {
                @apply text-accent mt-1 mr-3 text-lg;
            }

            .zoom-effect {
                transition: transform 0.3s ease;
            }

            .zoom-effect:hover {
                transform: scale(1.03);
            }

            .shadow-hover {
                transition: box-shadow 0.3s ease;
            }

            .shadow-hover:hover {
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body>
    <main id="primary" class="site-main">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            <!-- Breadcrumbs -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-primary">
                            <i class="fas fa-home mr-2"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <a href="#" class="ml-1 text-sm font-medium text-gray-500 hover:text-primary md:ml-2">Sản phẩm</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <span class="ml-1 text-sm font-medium text-primary md:ml-2">Chống thấm Sikaflex Construction</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Product Section -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-8">
                    <!-- Product Images -->
                    <div class="p-4 md:p-6 bg-gray-50">
                        <div class="relative rounded-lg overflow-hidden mb-4 shadow-hover">
                            <img width="500" height="388" src="http://obvietnam.local/wp-content/uploads/2025/04/59.jpg"
                                 class="w-full h-auto object-cover rounded-lg zoom-effect"
                                 alt="Chống thấm Sikaflex Construction"
                                 decoding="async">
                            <div class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded">
                                <i class="fas fa-star mr-1"></i> Bán chạy
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-3">
                            <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-md overflow-hidden transition-all">
                                <img src="http://obvietnam.local/wp-content/uploads/2025/04/59-400x310.jpg"
                                     class="w-full h-20 object-cover"
                                     alt="Chống thấm Sikaflex Construction thumbnail">
                            </div>
                            <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-md overflow-hidden transition-all">
                                <div class="w-full h-20 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-xl"></i>
                                </div>
                            </div>
                            <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-md overflow-hidden transition-all">
                                <div class="w-full h-20 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-xl"></i>
                                </div>
                            </div>
                            <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-md overflow-hidden transition-all">
                                <div class="w-full h-20 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-4 md:p-6">
                        <header class="entry-header mb-6">
                            <div class="flex justify-between items-start">
                                <h1 class="entry-title text-2xl md:text-3xl font-bold text-dark mb-2">Chống thấm Sikaflex Construction</h1>
                                <button class="text-gray-400 hover:text-primary">
                                    <i class="far fa-heart text-xl"></i>
                                </button>
                            </div>

                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-sm text-gray-500">(12 đánh giá)</span>
                            </div>

                            <div class="bg-blue-50 border-l-4 border-primary p-3 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-tags text-primary mr-2"></i>
                                    <span class="text-sm font-medium">Sản phẩm chất lượng cao, bảo hành 5 năm</span>
                                </div>
                            </div>
                        </header>

                        <div class="entry-content mb-6">
                            <h3 class="text-lg font-semibold text-dark mb-3">Đặc điểm nổi bật</h3>

                            <div class="space-y-3">
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Có thể dùng được ngay</span>
                                </div>
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Độ bám dính cao với mọi vật liệu</span>
                                </div>
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Khả năng chịu ảnh hưởng của thời tiết và chống lão hóa tốt</span>
                                </div>
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Khả năng co giãn cao lên đến 25%</span>
                                </div>
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Rất dễ thi công và sử dụng</span>
                                </div>
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Có thể sơn phủ lên trên tạo thẩm mỹ</span>
                                </div>
                                <div class="product-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Kháng lực xé rất tốt</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-actions mt-8 space-y-4 md:space-y-0 md:space-x-4">
                            <a href="http://obvietnam.local/lien-he/"
                               class="btn-primary inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-primary-dark shadow-sm transition-colors w-full md:w-auto">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Liên hệ đặt hàng
                            </a>

                            <a href="tel:0987654321"
                               class="btn-secondary inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-secondary hover:bg-secondary-dark shadow-sm transition-colors w-full md:w-auto">
                                <i class="fas fa-phone-alt mr-2"></i>
                                Gọi ngay
                            </a>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-shield-alt text-primary mr-2"></i>
                                <span>Bảo hành chính hãng 5 năm</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 mt-2">
                                <i class="fas fa-truck text-primary mr-2"></i>
                                <span>Miễn phí vận chuyển cho đơn hàng > 5 triệu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Tabs -->
                <div class="border-t border-gray-200 mt-6">
                    <div class="px-4 md:px-6">
                        <nav class="flex space-x-8" aria-label="Tabs">
                            <button class="border-b-2 border-primary text-primary px-4 py-4 text-sm font-medium">
                                Thông tin chi tiết
                            </button>
                            <button class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 px-4 py-4 text-sm font-medium">
                                Hướng dẫn sử dụng
                            </button>
                            <button class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 px-4 py-4 text-sm font-medium">
                                Đánh giá (12)
                            </button>
                        </nav>
                    </div>

                    <div class="px-4 md:px-6 py-6">
                        <div class="prose max-w-none">
                            <h3 class="text-lg font-semibold mb-3">Thông số kỹ thuật</h3>
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-700 bg-gray-50">Thương hiệu</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Sika</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-700 bg-gray-50">Xuất xứ</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Thụy Sĩ</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-700 bg-gray-50">Khối lượng</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">300ml/tuýp</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-700 bg-gray-50">Màu sắc</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">Trắng, Xám</td>
                                </tr>
                                </tbody>
                            </table>

                            <h3 class="text-lg font-semibold mt-6 mb-3">Mô tả sản phẩm</h3>
                            <p>Sikaflex Construction là sản phẩm chống thấm đa năng, chất lượng cao từ thương hiệu Sika nổi tiếng thế giới. Sản phẩm được sử dụng rộng rãi trong các công trình xây dựng dân dụng và công nghiệp nhờ khả năng chống thấm vượt trội và độ bền cao.</p>
                        </div>
                    </div>
                </div>

                <!-- Related Products -->
                <div class="p-4 md:p-6 border-t border-gray-200 bg-gray-50">
                    <h2 class="text-2xl font-bold text-dark mb-6">Sản phẩm liên quan</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg">
                            <div class="bg-gray-100 h-48 flex items-center justify-center relative">
                                <img src="http://obvietnam.local/wp-content/uploads/2025/04/59-400x310.jpg"
                                     class="w-full h-full object-cover"
                                     alt="Sản phẩm liên quan">
                                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded">
                                    Mới
                                </div>
                            </div>

                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">
                                    <a href="#" class="text-dark hover:text-primary transition-colors">
                                        Sika Primer 215
                                    </a>
                                </h3>
                                <div class="text-sm text-gray-700 mb-3 line-clamp-2">
                                    Chất lỏng gốc dung môi, dùng làm lớp lót cho bê tông trước khi thi công vật liệu chống thấm.
                                </div>
                                <a href="#" class="text-primary hover:text-primary-dark font-medium inline-flex items-center text-sm transition-colors">
                                    Xem chi tiết
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg">
                            <div class="bg-gray-100 h-48 flex items-center justify-center">
                                <i class="fas fa-box text-4xl text-gray-400"></i>
                            </div>

                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">
                                    <a href="#" class="text-dark hover:text-primary transition-colors">
                                        SikaTop Seal 107
                                    </a>
                                </h3>
                                <div class="text-sm text-gray-700 mb-3 line-clamp-2">
                                    Vữa chống thấm gốc xi măng đàn hồi 2 thành phần, dùng cho bề mặt bê tông.
                                </div>
                                <a href="#" class="text-primary hover:text-primary-dark font-medium inline-flex items-center text-sm transition-colors">
                                    Xem chi tiết
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg">
                            <div class="bg-gray-100 h-48 flex items-center justify-center">
                                <i class="fas fa-box text-4xl text-gray-400"></i>
                            </div>

                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">
                                    <a href="#" class="text-dark hover:text-primary transition-colors">
                                        SikaFlex Pro 3
                                    </a>
                                </h3>
                                <div class="text-sm text-gray-700 mb-3 line-clamp-2">
                                    Keo dán đa năng 1 thành phần, độ đàn hồi cao, chống thấm nước.
                                </div>
                                <a href="#" class="text-primary hover:text-primary-dark font-medium inline-flex items-center text-sm transition-colors">
                                    Xem chi tiết
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg">
                            <div class="bg-gray-100 h-48 flex items-center justify-center">
                                <i class="fas fa-box text-4xl text-gray-400"></i>
                            </div>

                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">
                                    <a href="http://obvietnam.local/san-pham/aasfasf/" class="text-dark hover:text-primary transition-colors">
                                        àasfasf
                                    </a>
                                </h3>
                                <div class="text-sm text-gray-700 mb-3 line-clamp-2">
                                    fasf
                                </div>
                                <a href="http://obvietnam.local/san-pham/aasfasf/" class="text-primary hover:text-primary-dark font-medium inline-flex items-center text-sm transition-colors">
                                    Xem chi tiết
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>
    </body>
    </html>

<?php
get_footer();

