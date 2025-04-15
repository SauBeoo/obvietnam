<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Chain Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }

        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(90deg, #3b82f6, #10b981);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50">
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="text-center mb-16">
            <span class="text-sm font-semibold tracking-wider uppercase gradient-text">
                Giải pháp chuỗi cung ứng
            </span>
        <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl">
            Giải Pháp Chuỗi Cung Ứng Toàn Diện
        </h2>
        <p class="mt-4 max-w-2xl text-xl text-gray-600 mx-auto">
            Chúng tôi cung cấp giải pháp chuỗi cung ứng toàn diện, giúp doanh nghiệp tối ưu hoá chi phí và nâng cao hiệu quả quản lý.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Transportation Card -->
        <div class="service-card animate-fadeIn delay-100 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 ease-in-out hover:border-blue-500 border border-transparent">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-blue-50 text-blue-600">
                    <i class="fas fa-truck text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-900 mb-4">Vận Chuyển Đa Phương Thức</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Vận chuyển đường bộ</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Vận chuyển đường biển</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Vận chuyển hàng không</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Vận chuyển đa phương thức</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Warehouse Card -->
        <div class="service-card animate-fadeIn delay-200 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 ease-in-out hover:border-indigo-500 border border-transparent">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-indigo-50 text-indigo-600">
                    <i class="fas fa-warehouse text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-900 mb-4">Dịch Vụ Kho Bãi</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Kho ngoại quan</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Kho CFS/ICD</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Kho lạnh</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Kho thường</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Order Management Card -->
        <div class="service-card animate-fadeIn delay-300 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 ease-in-out hover:border-emerald-500 border border-transparent">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-emerald-50 text-emerald-600">
                    <i class="fas fa-clipboard-list text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-900 mb-4">Quản Lý Đơn Hàng</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Theo dõi đơn hàng</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Báo cáo thời gian thực</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Quản lý tồn kho</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Tối ưu hóa đơn hàng</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Consulting Card -->
        <div class="service-card animate-fadeIn delay-100 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 ease-in-out hover:border-purple-500 border border-transparent">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-purple-50 text-purple-600">
                    <i class="fas fa-chart-line text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-900 mb-4">Tư Vấn Chuỗi Cung Ứng</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Phân tích chuỗi cung ứng</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Tối ưu hóa chi phí</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Tư vấn chiến lược</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                        <span class="text-gray-600">Đào tạo nhân sự</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
</body>
</html>