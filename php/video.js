function mudarvideo(src, title, description) {
    var video = document.getElementById('principal-video');
    video.src = src;

    var videoTitle = document.querySelector('#video-descricao h3');
    videoTitle.textContent = title;

    var videoDescription = document.querySelector('#video-descricao p');
    videoDescription.textContent = description;
  }