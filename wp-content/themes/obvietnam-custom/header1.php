<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Trang tin tức cập nhật những thông tin mới nhất về công nghệ, kinh doanh, giải trí và cuộc sống">
	<title>Tin Tức Mới Nhất | Cập Nhật 24/7</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		.news-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
		}
		.category-active {
			background-color: #3b82f6;
			color: white;
		}
		.read-more-btn:hover .arrow {
			transform: translateX(3px);
		}
	</style>
</head>
<body class="bg-gray-50 font-sans">

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-12">
	<div class="container mx-auto px-4">
		<div class="max-w-3xl mx-auto text-center">
			<h1 class="text-3xl md:text-4xl font-bold mb-4">Cập Nhật Tin Tức Mới Nhất 24/7</h1>
			<p class="text-lg mb-6">Khám phá những tin tức nóng hổi, bài phân tích chuyên sâu và những câu chuyện đáng chú ý nhất</p>
			<div class="relative max-w-xl mx-auto">
				<input type="text" placeholder="Tìm kiếm tin tức..."
					   class="w-full pl-10 pr-4 py-3 rounded-full border border-transparent focus:outline-none focus:ring-2 focus:ring-white text-gray-800">
				<i class="fas fa-search absolute left-3 top-4 text-gray-500"></i>
			</div>
		</div>
	</div>
</section>

<!-- Main Content -->
<main class="container mx-auto px-4 py-8">
	<div class="flex flex-col lg:flex-row gap-8">
		<!-- News List -->
		<div class="lg:w-2/3">
			<!-- Category Filter -->
			<div class="mb-8 bg-white rounded-lg shadow p-4">
				<h2 class="text-lg font-semibold mb-4 text-gray-800">Danh mục tin tức</h2>
				<div class="flex flex-wrap gap-2">
					<button class="category-active px-4 py-2 rounded-full text-sm font-medium transition">Tất cả</button>
					<button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full text-sm font-medium transition">Công nghệ</button>
					<button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full text-sm font-medium transition">Kinh doanh</button>
					<button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full text-sm font-medium transition">Giải trí</button>
					<button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full text-sm font-medium transition">Thể thao</button>
					<button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full text-sm font-medium transition">Sức khỏe</button>
				</div>
			</div>

			<!-- News Grid -->
			<div class="grid md:grid-cols-2 gap-6" id="newsContainer">
				<!-- News Item 1 -->
				<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
					<div class="relative">
						<img src="https://source.unsplash.com/random/600x400/?technology" alt="Công nghệ AI đang thay đổi thế giới" class="w-full h-48 object-cover">
						<span class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded">Công nghệ</span>
					</div>
					<div class="p-5">
						<div class="flex items-center text-sm text-gray-500 mb-2">
							<span><i class="far fa-clock mr-1"></i> 2 giờ trước</span>
							<span class="mx-2">•</span>
							<span><i class="far fa-eye mr-1"></i> 1.2K lượt xem</span>
						</div>
						<h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
							<a href="#">Công nghệ AI đang thay đổi cách chúng ta làm việc trong tương lai</a>
						</h2>
						<p class="text-gray-600 mb-4">Những tiến bộ trong trí tuệ nhân tạo đang tạo ra những thay đổi đáng kể trong nhiều ngành công nghiệp, từ chăm sóc sức khỏe đến tài chính...</p>
						<div class="flex justify-between items-center">
							<div class="flex items-center">
								<img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Tác giả" class="w-8 h-8 rounded-full mr-2">
								<span class="text-sm text-gray-600">Nguyễn Văn A</span>
							</div>
							<a href="#" class="read-more-btn text-blue-500 font-medium text-sm flex items-center">
								Đọc tiếp <i class="fas fa-arrow-right ml-1 arrow transition"></i>
							</a>
						</div>
					</div>
				</article>

				<!-- News Item 2 -->
				<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
					<div class="relative">
						<img src="https://source.unsplash.com/random/600x400/?business" alt="Kinh doanh trong thời đại số" class="w-full h-48 object-cover">
						<span class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded">Kinh doanh</span>
					</div>
					<div class="p-5">
						<div class="flex items-center text-sm text-gray-500 mb-2">
							<span><i class="far fa-clock mr-1"></i> 5 giờ trước</span>
							<span class="mx-2">•</span>
							<span><i class="far fa-eye mr-1"></i> 890 lượt xem</span>
						</div>
						<h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
							<a href="#">Chiến lược kinh doanh hiệu quả trong thời đại số hóa</a>
						</h2>
						<p class="text-gray-600 mb-4">Các doanh nghiệp đang phải thích nghi với sự thay đổi nhanh chóng của thị trường và công nghệ. Đâu là chiến lược giúp doanh nghiệp tồn tại và phát triển?</p>
						<div class="flex justify-between items-center">
							<div class="flex items-center">
								<img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Tác giả" class="w-8 h-8 rounded-full mr-2">
								<span class="text-sm text-gray-600">Trần Thị B</span>
							</div>
							<a href="#" class="read-more-btn text-blue-500 font-medium text-sm flex items-center">
								Đọc tiếp <i class="fas fa-arrow-right ml-1 arrow transition"></i>
							</a>
						</div>
					</div>
				</article>

				<!-- News Item 3 -->
				<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
					<div class="relative">
						<img src="https://source.unsplash.com/random/600x400/?entertainment" alt="Giải trí mùa hè" class="w-full h-48 object-cover">
						<span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded">Giải trí</span>
					</div>
					<div class="p-5">
						<div class="flex items-center text-sm text-gray-500 mb-2">
							<span><i class="far fa-clock mr-1"></i> Hôm qua</span>
							<span class="mx-2">•</span>
							<span><i class="far fa-eye mr-1"></i> 2.4K lượt xem</span>
						</div>
						<h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
							<a href="#">Top 10 bộ phim đáng chờ đợi nhất nửa cuối năm 2023</a>
						</h2>
						<p class="text-gray-600 mb-4">Nửa cuối năm 2023 hứa hẹn mang đến nhiều tác phẩm điện ảnh đình đám với dàn diễn viên nổi tiếng và kịch bản hấp dẫn...</p>
						<div class="flex justify-between items-center">
							<div class="flex items-center">
								<img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Tác giả" class="w-8 h-8 rounded-full mr-2">
								<span class="text-sm text-gray-600">Lê Văn C</span>
							</div>
							<a href="#" class="read-more-btn text-blue-500 font-medium text-sm flex items-center">
								Đọc tiếp <i class="fas fa-arrow-right ml-1 arrow transition"></i>
							</a>
						</div>
					</div>
				</article>

				<!-- News Item 4 -->
				<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
					<div class="relative">
						<img src="https://source.unsplash.com/random/600x400/?health" alt="Sức khỏe mùa hè" class="w-full h-48 object-cover">
						<span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">Sức khỏe</span>
					</div>
					<div class="p-5">
						<div class="flex items-center text-sm text-gray-500 mb-2">
							<span><i class="far fa-clock mr-1"></i> 2 ngày trước</span>
							<span class="mx-2">•</span>
							<span><i class="far fa-eye mr-1"></i> 3.1K lượt xem</span>
						</div>
						<h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
							<a href="#">Cách bảo vệ sức khỏe trong những ngày nắng nóng đỉnh điểm</a>
						</h2>
						<p class="text-gray-600 mb-4">Nắng nóng kéo dài có thể gây nhiều vấn đề sức khỏe. Chuyên gia khuyến cáo 5 biện pháp đơn giản nhưng hiệu quả để bảo vệ bản thân và gia đình...</p>
						<div class="flex justify-between items-center">
							<div class="flex items-center">
								<img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Tác giả" class="w-8 h-8 rounded-full mr-2">
								<span class="text-sm text-gray-600">Phạm Thị D</span>
							</div>
							<a href="#" class="read-more-btn text-blue-500 font-medium text-sm flex items-center">
								Đọc tiếp <i class="fas fa-arrow-right ml-1 arrow transition"></i>
							</a>
						</div>
					</div>
				</article>

				<!-- News Item 5 -->
				<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
					<div class="relative">
						<img src="https://source.unsplash.com/random/600x400/?sport" alt="Thể thao quốc tế" class="w-full h-48 object-cover">
						<span class="absolute top-2 left-2 bg-yellow-500 text-white text-xs px-2 py-1 rounded">Thể thao</span>
					</div>
					<div class="p-5">
						<div class="flex items-center text-sm text-gray-500 mb-2">
							<span><i class="far fa-clock mr-1"></i> 3 ngày trước</span>
							<span class="mx-2">•</span>
							<span><i class="far fa-eye mr-1"></i> 4.5K lượt xem</span>
						</div>
						<h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
							<a href="#">Việt Nam giành huy chương vàng tại giải đấu quốc tế</a>
						</h2>
						<p class="text-gray-600 mb-4">Đội tuyển Việt Nam đã xuất sắc giành huy chương vàng tại giải đấu thể thao quốc tế, mang về niềm tự hào lớn cho thể thao nước nhà...</p>
						<div class="flex justify-between items-center">
							<div class="flex items-center">
								<img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Tác giả" class="w-8 h-8 rounded-full mr-2">
								<span class="text-sm text-gray-600">Hoàng Văn E</span>
							</div>
							<a href="#" class="read-more-btn text-blue-500 font-medium text-sm flex items-center">
								Đọc tiếp <i class="fas fa-arrow-right ml-1 arrow transition"></i>
							</a>
						</div>
					</div>
				</article>

				<!-- News Item 6 -->
				<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
					<div class="relative">
						<img src="https://source.unsplash.com/random/600x400/?education" alt="Giáo dục hiện đại" class="w-full h-48 object-cover">
						<span class="absolute top-2 left-2 bg-indigo-500 text-white text-xs px-2 py-1 rounded">Giáo dục</span>
					</div>
					<div class="p-5">
						<div class="flex items-center text-sm text-gray-500 mb-2">
							<span><i class="far fa-clock mr-1"></i> 1 tuần trước</span>
							<span class="mx-2">•</span>
							<span><i class="far fa-eye mr-1"></i> 1.8K lượt xem</span>
						</div>
						<h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
							<a href="#">Xu hướng giáo dục hiện đại: Học tập cá nhân hóa với công nghệ</a>
						</h2>
						<p class="text-gray-600 mb-4">Các phương pháp giáo dục truyền thống đang dần được thay thế bằng những mô hình học tập cá nhân hóa, tận dụng tối đa lợi ích từ công nghệ...</p>
						<div class="flex justify-between items-center">
							<div class="flex items-center">
								<img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Tác giả" class="w-8 h-8 rounded-full mr-2">
								<span class="text-sm text-gray-600">Ngô Thị F</span>
							</div>
							<a href="#" class="read-more-btn text-blue-500 font-medium text-sm flex items-center">
								Đọc tiếp <i class="fas fa-arrow-right ml-1 arrow transition"></i>
							</a>
						</div>
					</div>
				</article>
			</div>

			<!-- Pagination -->
			<div class="mt-10 flex justify-center">
				<nav class="flex items-center space-x-1">
					<button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">
						<i class="fas fa-chevron-left"></i>
					</button>
					<button class="px-3 py-1 rounded border bg-blue-500 text-white">1</button>
					<button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">2</button>
					<button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">3</button>
					<button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">4</button>
					<button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">5</button>
					<button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">
						<i class="fas fa-chevron-right"></i>
					</button>
				</nav>
			</div>
		</div>

		<!-- Sidebar -->
		<div class="lg:w-1/3 space-y-6">
			<!-- Popular News -->
			<div class="bg-white rounded-lg shadow p-5">
				<h2 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2 flex items-center">
					<i class="fas fa-fire text-red-500 mr-2"></i> Tin nổi bật
				</h2>
				<div class="space-y-4">
					<div class="flex gap-3">
						<div class="flex-shrink-0">
							<img src="https://source.unsplash.com/random/100x100/?breakingnews" alt="Tin nổi bật" class="w-16 h-16 rounded object-cover">
						</div>
						<div>
							<h3 class="font-medium text-gray-800 hover:text-blue-500 transition">
								<a href="#">Chính phủ ban hành chính sách mới hỗ trợ doanh nghiệp nhỏ</a>
							</h3>
							<div class="flex items-center text-xs text-gray-500 mt-1">
								<span><i class="far fa-clock mr-1"></i> 4 giờ trước</span>
								<span class="mx-2">•</span>
								<span><i class="far fa-eye mr-1"></i> 2.3K</span>
							</div>
						</div>
					</div>

					<div class="flex gap-3">
						<div class="flex-shrink-0">
							<img src="https://source.unsplash.com/random/100x100/?hotnews" alt="Tin nổi bật" class="w-16 h-16 rounded object-cover">
						</div>
						<div>
							<h3 class="font-medium text-gray-800 hover:text-blue-500 transition">
								<a href="#">iPhone 15 ra mắt với nhiều cải tiến đột phá về camera</a>
							</h3>
							<div class="flex items-center text-xs text-gray-500 mt-1">
								<span><i class="far fa-clock mr-1"></i> 6 giờ trước</span>
								<span class="mx-2">•</span>
								<span><i class="far fa-eye mr-1"></i> 5.1K</span>
							</div>
						</div>
					</div>

					<div class="flex gap-3">
						<div class="flex-shrink-0">
							<img src="https://source.unsplash.com/random/100x100/?trending" alt="Tin nổi bật" class="w-16 h-16 rounded object-cover">
						</div>
						<div>
							<h3 class="font-medium text-gray-800 hover:text-blue-500 transition">
								<a href="#">Bão số 3 đổ bộ vào miền Trung, nhiều địa phương chịu thiệt hại nặng</a>
							</h3>
							<div class="flex items-center text-xs text-gray-500 mt-1">
								<span><i class="far fa-clock mr-1"></i> 8 giờ trước</span>
								<span class="mx-2">•</span>
								<span><i class="far fa-eye mr-1"></i> 3.7K</span>
							</div>
						</div>
					</div>

					<div class="flex gap-3">
						<div class="flex-shrink-0">
							<img src="https://source.unsplash.com/random/100x100/?popular" alt="Tin nổi bật" class="w-16 h-16 rounded object-cover">
						</div>
						<div>
							<h3 class="font-medium text-gray-800 hover:text-blue-500 transition">
								<a href="#">Giá xăng dầu thế giới tăng mạnh, trong nước điều chỉnh giá</a>
							</h3>
							<div class="flex items-center text-xs text-gray-500 mt-1">
								<span><i class="far fa-clock mr-1"></i> 10 giờ trước</span>
								<span class="mx-2">•</span>
								<span><i class="far fa-eye mr-1"></i> 2.9K</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Tags -->
			<div class="bg-white rounded-lg shadow p-5">
				<h2 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2">Từ khóa phổ biến</h2>
				<div class="flex flex-wrap gap-2">
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#công nghệ</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#kinh doanh</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#chứng khoán</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#bất động sản</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#giải trí</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#phim ảnh</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#thể thao</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#bóng đá</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#sức khỏe</a>
					<a href="#" class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">#đời sống</a>
				</div>
			</div>
		</div>
	</div>
</main>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-6 right-6 bg-blue-500 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all">
	<i class="fas fa-arrow-up"></i>
</button>

<script>
	// Mobile Menu Toggle
	document.querySelector('.md\\:hidden button').addEventListener('click', function() {
		const menu = document.getElementById('mobileMenu');
		menu.classList.toggle('hidden');
	});

	// Category Filter
	const categoryButtons = document.querySelectorAll('.bg-gray-100, .category-active');
	categoryButtons.forEach(button => {
		button.addEventListener('click', function() {
			categoryButtons.forEach(btn => {
				btn.classList.remove('category-active');
				btn.classList.add('bg-gray-100');
			});
			this.classList.add('category-active');
			this.classList.remove('bg-gray-100');

			// In a real app, you would filter news here
		});
	});

	// Back to Top Button
	const backToTopButton = document.getElementById('backToTop');
	window.addEventListener('scroll', function() {
		if (window.pageYOffset > 300) {
			backToTopButton.classList.remove('opacity-0', 'invisible');
			backToTopButton.classList.add('opacity-100', 'visible');
		} else {
			backToTopButton.classList.remove('opacity-100', 'visible');
			backToTopButton.classList.add('opacity-0', 'invisible');
		}
	});

	backToTopButton.addEventListener('click', function() {
		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
	});

	// Simulate loading more news (for demo purposes)
	let isLoading = false;
	window.addEventListener('scroll', function() {
		if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 500 && !isLoading) {
			isLoading = true;
			// In a real app, you would load more news here via AJAX
			setTimeout(() => {
				isLoading = false;
			}, 1000);
		}
	});
</script>
</body>
</html>