<script>

    $(document).ready(function() {
        $("form").on("submit", function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "<?php echo BASE_URL; ?>/include",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("form")[0].reset();
                    $("#preview").hide();

                    if (typeof response === 'string') {
                        response = JSON.parse(response);
                    }


                    if (response.status == "success") {
                        $(successToast)
                            .removeClass('text-bg-danger')
                            .addClass('text-bg-success')
                            .find('.toast-body')
                            .text(response.message);
                    } else if (response.status == "error") {
                        $(successToast)
                            .removeClass('text-bg-success')
                            .addClass('text-bg-danger')
                            .find('.toast-body')
                            .text(response.message);
                    }

                    $(successToast).toast('show');


                },
                error: function() {
                    alert("Ocorreu um erro ao incluir o produto.");
                }
            });
        });

        window.previewImagem = function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let output = document.querySelector('#preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    });

</script>

<h1>Página do admin</h1>

<form action="<?php echo BASE_URL;?>/include" class="mt-5" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite nome do produto" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" placeholder="Descreva o produto"></textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Preço:</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Digite o preço">
    </div>

    <div class="mb-3">
        <label for="floatingSelect">Selecione a categoria</label>
        <select class="form-select" id="floatingSelect" name="category">
            <option value="1" selected>Relógio</option>
            <option value="2">Roupas</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label">Upload de Imagem</label>
        <input class="form-control" type="file" id="imagem" name="image" accept="image/*" onchange="previewImagem(event)">
    </div>

    <div class="mb-3 text-center">
        <img id="preview" src="#" class="img-thumbnail" style="display: none; max-width: 200px;">
    </div>

    <button type="submit" class="btn btn-primary w-100">Enviar</button>

</form>


<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Ação realizada com sucesso!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

