document.addEventListener('DOMContentLoaded', function() {
    fetch('/data/new-movie-list.json')
    .then(response => response.json())
    .then(data=> {
        const newmovieContainer = document.querySelector('.new-movie-list-container');
        if (newmovieContainer) {
        data.forEach(movie => {
            const movieDiv = document.createElement('div');
            movieDiv.classList.add('new-movie-list');
            movieDiv.innerHTML = `
                <img src="${movie.image}" alt="${movie.title}">
                <div class="new-movie-list-info">
                    <h5>${movie.title}</h5>
                    <p>${movie.subtitle}</p>
                </div>
            `;
            newmovieContainer.appendChild(movieDiv);
        })
    } else {
        console.error('Container not found');
    }
    })
    .catch(error => {
        console.error('Error fetching new movie list:', error);
    });
})
