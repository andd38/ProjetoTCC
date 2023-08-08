fetch('coletarwatch.php')
    .then(response => response.json())
    .then(data => {
        if (data.length > 0) {
            const cursosProgressoDiv = document.getElementById('cursos-progresso');
            const emitirCertificadoDiv = document.getElementById('emitir-certificado');

            data.forEach(curso => {
                const cursoDiv = document.createElement('div');
                cursoDiv.classList.add('curso-item');

                const nomeCurso = document.createElement('h2');
                nomeCurso.textContent = curso.nomeCurso;
                cursoDiv.appendChild(nomeCurso);

                const label = document.createElement('div');
                label.textContent = `Progresso: ${curso.progressoCurso.toFixed(2)}%`;
                cursoDiv.appendChild(label);

                const progressBar = document.createElement('div');
                progressBar.classList.add('progress-bar');
                const progressFill = document.createElement('div');
                progressFill.classList.add('progress-fill');
                progressFill.style.width = curso.progressoCurso + '%';
                progressBar.appendChild(progressFill);
                cursoDiv.appendChild(progressBar);

                cursosProgressoDiv.appendChild(cursoDiv);

                if (curso.progressoCurso === 100) {
                    const formCertificado = document.createElement('form');
                    formCertificado.action = '../php/certificado.php';
                    formCertificado.method = 'post';
                    emitirCertificadoDiv.appendChild(formCertificado);

                    const inputCurso = document.createElement('input');
                    inputCurso.type = 'hidden';
                    inputCurso.name = 'curso';
                    inputCurso.value = curso.nomeCurso;
                    formCertificado.appendChild(inputCurso);

                    const botaoCertificado = document.createElement('input');
                    botaoCertificado.type = 'submit';
                    botaoCertificado.name = 'certi';
                    botaoCertificado.value = `Emitir Certificado para ${curso.nomeCurso}`;
                    formCertificado.appendChild(botaoCertificado);
                }
            });
        }
    })
    .catch(error => console.error('Erro ao obter os dados:', error));
