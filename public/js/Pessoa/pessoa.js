
document.getElementById('search').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#pessoa-list tr');
    
    rows.forEach(row => {
        let nome = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        row.style.display = nome.includes(filter) ? '' : 'none';
    });
});

function deletePessoa(id) {
    if (confirm("Tem certeza que deseja excluir esta pessoa?")) {
        fetch(`/maga-backend/pessoa/destroy/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.href = '/maga-backend/pessoas'; // Redireciona após a exclusão
            } else {
                alert('Erro ao deletar a pessoa.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro na requisição.');
        });
    }
}