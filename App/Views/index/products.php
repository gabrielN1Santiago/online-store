<style>
  .min-height-sm {
    min-height: 200px;
  }

  .min-height-md {
    min-height: 300px;
  }

  .min-height-lg {
    min-height: 200px;
  }

  @media (max-width: 575.98px) {
    .min-height-responsive {
      min-height: 200px;
      max-height: 200px;

    }
  }

  @media (min-width: 576px) and (max-width: 767.98px) {
    .min-height-responsive {
      min-height: 200px;
      max-height: 200px;
    }
  }

  @media (min-width: 768px) and (max-width: 991.98px) {
    .min-height-responsive {
      min-height: 200px;
      max-height: 200px;
    }
  }

  @media (min-width: 992px) {
    .min-height-responsive {
      min-height: 200px;
      max-height: 200px;
    }
  }

  .paragraphCardProduct{
    overflow: hidden;
  }

  .card-img-top{
    min-height: 250px;
    max-height: 250px;
  }


</style>

<script>
  function filterByCategory() {
    const selectedCategory = document.getElementById('categoryFilter').value;
    const products = document.querySelectorAll('.product');

    products.forEach(product => {
      const productCategory = product.getAttribute('data-category');

      if (selectedCategory === "" || productCategory == selectedCategory) {
        product.style.display = "block";
      } else {
        product.style.display = "none";
      }
    });
  }
</script>

<h1 class="mainTitle">Produtos disponíveis</h1>

<div class="mb-4">
  <label for="categoryFilter">Filtrar por Categoria:</label>
  <select id="categoryFilter" class="form-select" onchange="filterByCategory()">
    <option value="">Selecione uma categoria</option>
    <option value="1">Relógios</option>
    <option value="2">Roupas</option>
  </select>
</div>

<div class="row mt-5" id="product-list">

  <?php if(count($this->view->products) > 0): ?>

    <?php foreach($this->view->products as $product): ?>

      <div class="col-lg-4 col-12 col-sm-12 col-md-6 mb-4 h-100 product" data-category="<?php echo $product->category; ?>">

        <div class="card d-flex flex-column ml-sm-3">
          <img src="<?php echo $product->image != null ? BASE_URL . '/images/' . $product->image : BASE_URL . '/images/' . 'shopping.webp'; ?>" class="card-img-top">
          <a href="/product?id=<?php echo $product->id?>">
            <h5 class="card-title"><?php echo $product->name;?></h5>
          </a>
          <div class="card-body flex-grow-1">
            <p class="card-text fs-1 fs-sm-2 fs-md-3 fs-lg-4 min-height-responsive paragraphCardProduct">
              <?php echo $product->description == "" ? "Sem descrição" : $product->description;?>
            </p>
          </div>
          <?php if(isset($_SESSION['id'])):?>
            <a class="btn btn-danger" href="<?php echo  BASE_URL . "/delete?id=".$product->id;?>">Excluir</a>
          <?php endif;?>
        </div>
      </div>

    <?php endforeach; ?>

  <?php else:?>
      <div>Nenhum produto no momento, volte mais tarde!</div>
  <?php endif;?>

</div>
