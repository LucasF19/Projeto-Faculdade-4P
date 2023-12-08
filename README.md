<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .gallery img:hover {
            transform: scale(1.1);
        }

        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
        }

        .lightbox img {
            display: block;
            margin: auto;
            margin-top: 10%;
            max-width: 80%;
            max-height: 80%;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.8);
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 20px;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="gallery">
    <!-- Substitua as URLs abaixo pelas URLs das suas imagens -->
    <img src="url_da_imagem_1.jpg" alt="Imagem 1">
    <img src="url_da_imagem_2.jpg" alt="Imagem 2">
    <img src="url_da_imagem_3.jpg" alt="Imagem 3">
    <!-- Adicione mais imagens conforme necessário -->
</div>

<div class="lightbox" id="lightbox">
    <span class="close-btn" onclick="closeLightbox()">&times;</span>
    <img src="" alt="Imagem em destaque" id="lightbox-img">
</div>

<script>
    const gallery = document.querySelector('.gallery');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');

    gallery.addEventListener('click', (e) => {
        if (e.target.tagName === 'IMG') {
            lightbox.style.display = 'flex';
            lightboxImg.src = e.target.src;
        }
    });

    function closeLightbox() {
        lightbox.style.display = 'none';
    }
</script>

</body>
</html>
