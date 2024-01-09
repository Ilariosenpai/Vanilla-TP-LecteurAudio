
    function filtrerMusiquesDisponibles() {
        const rechercheMusique = document.getElementById('rechercheMusique').value.toLowerCase();
        const musiquesDisponibles = document.getElementsByClassName('musique-disponible');

        for (const musique of musiquesDisponibles) {
            const texteMusique = musique.innerText.toLowerCase();
            const boutonAjouter = musique.querySelector('.btn-primary');

            if (texteMusique.includes(rechercheMusique) || boutonAjouter.innerText.toLowerCase().includes(rechercheMusique)) {
                musique.style.display = 'block';
            } else {
                musique.style.display = 'none';
            }
        }
    }

 
    const start = document.querySelector('.start');
const pause = document.querySelector('.pause');
const audios = document.querySelector('audio');
const player = document.querySelector('#audioPlayer');

start.addEventListener('click', () => {
    audios.play();
})

pause.addEventListener('click', () => {
    audios.pause();
})


player.play();
 player.pause();
 player.currentTime = 0

