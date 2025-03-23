document.addEventListener('DOMContentLoaded', function() {
    fetch('/data/slides.json')
    .then(response => response.json())
    .then(data => {
        const movieContainer = document.getElementById('slides-container');
        const slidesToShow = 4; // Số slide hiển thị cùng lúc
        const slideWidth = 100 / slidesToShow; // Chiều rộng mỗi slide (tính theo %)

        // Tạo các slide từ dữ liệu JSON
        data.forEach(movie => {
            const movieDiv = document.createElement('div');
            movieDiv.classList.add('movie');
            movieDiv.style.flex = `0 0 ${slideWidth}%`; // Đặt chiều rộng mỗi slide
            movieDiv.innerHTML = `
                <img src="${movie.image}" alt="${movie.title}">
                <div class="movie-info">
                    <h5>${movie.title}</h5>
                    <p>${movie.subtitle}</p>
                </div>
            `;
            movieContainer.appendChild(movieDiv);
        });

        // Khởi tạo slider
        initializeSlider(data.length, slidesToShow);
    });
});

let currentIndex = 0;

function initializeSlider(totalSlides, slidesToShow) {
    const slidesContainer = document.getElementById('slides-container');

    // Đặt chiều rộng container để chứa tất cả các slide
    slidesContainer.style.width = `${(totalSlides * 100) / slidesToShow}%`;

    // Hiển thị slide đầu tiên
    showSlide(currentIndex, slidesToShow, totalSlides);
}

function showSlide(index, slidesToShow, totalSlides) {
    const slidesContainer = document.getElementById('slides-container');

    // Kiểm tra giới hạn của index
    if (index > totalSlides - slidesToShow) {
        currentIndex = totalSlides - slidesToShow; // Không cho vượt quá slide cuối
    } else if (index < 0) {
        currentIndex = 0; // Không cho vượt quá slide đầu
    } else {
        currentIndex = index;
    }

    // Dịch chuyển container để hiển thị các slide
    slidesContainer.style.transform = `translateX(-${currentIndex * (100 / slidesToShow)}%)`;
}

function nextSlide() {
    const slidesContainer = document.getElementById('slides-container');
    const totalSlides = slidesContainer.children.length;
    const slidesToShow = 4; // Số slide hiển thị cùng lúc

    showSlide(currentIndex + 1, slidesToShow, totalSlides);
}

function prevSlide() {
    const slidesContainer = document.getElementById('slides-container');
    const totalSlides = slidesContainer.children.length;
    const slidesToShow = 4; // Số slide hiển thị cùng lúc

    showSlide(currentIndex - 1, slidesToShow, totalSlides);
}
