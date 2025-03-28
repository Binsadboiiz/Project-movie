document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/movies')
    .then(response => response.json())
    .then(data => {
        const newmovieContainer = document.querySelector('.new-movie-list-container');
        if (newmovieContainer) {
            const limitedMovies = data.slice(0, 8);
            limitedMovies.forEach(movie => {
                const movieDiv = document.createElement('div');
                movieDiv.classList.add('new-movie-list');
                movieDiv.innerHTML = `
                    <a href="/movies/${movie.id}">
                        <img src="${movie.image}" alt="${movie.title}" style="cursor: pointer;">
                    </a>
                    <div class="new-movie-list-info">
                        <h5>${movie.title}</h5>
                        <p>${movie.subtitle}</p>
                    </div>
                `;
                newmovieContainer.appendChild(movieDiv);
            });
        } else {
            console.error('Container not found');
        }
    })
    .catch(error => {
        console.error('Error fetching new movie list:', error);
    });
});
