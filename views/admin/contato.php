<div class="content_">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            Contato
        </h3>
        <small>Entre em contato conosco!</small>
    </div>
    <form id="contato_form" method="post">
        <input type="hidden" name="id_pessoa" value="<?= $_SESSION['user_id'] ?>">
        <div class="item_form">
            <label for="endereco">Assunto</label>
            <input type="text" name="assunto" id="assunto" required>
        </div>
        <div class="item_form">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
        </div>
        <button class="btn contact_btn" type="submit">Enviar</button>
    </form>
</div>

<script>
    document.querySelector("#contato_form").addEventListener("submit", function(e) {
        e.preventDefault();
        let form = e.target;
        let data = new FormData(form);
        fetch(`${base_url}/api/enviarcontato`, {
            method: "POST",
            body: data
        }).then(response => response.json()).then(response => {
            if (response.success) {
                alert("Mensagem enviada com sucesso!");
                form.reset();
            } else {
                alert("Erro ao enviar mensagem!");
            }
        });
    })
</script>