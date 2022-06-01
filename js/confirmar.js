//  Código para executar a exluir linha dos link
const link = document.querySelectorAll('.excluir');
    for(let i = 0; i < link.length; i++) {
        link[i].addEventListener('click', function(e) {
            e.preventDefault();

            if(confirm('Deseja Exluir? ')){
                location.href = this.href;
            }
        })
    }
