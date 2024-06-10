function enviarPizzas(tamanho, total) {
    fetch('../PHP/consultas/salvaPizza.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ tamanho, total, ingredientes: Object.fromEntries(ingredientes) })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data)

        if (data.success) {
            console.log('Pizza salva com sucesso:', data.data);
        } else {
            console.error('Erro ao salvar a pizza:', data.message);
        }
    })
    .catch(error => {
        console.error(`Erro na requisição: `, error);
    }) 
}