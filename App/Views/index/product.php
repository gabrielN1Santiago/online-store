<h1><?php echo $this->view->product['name'] ;?></h1>

<div  style="text-align: center;">

    <img class="mainImage mb-4" src="<?php echo $this->view->product['image'] != null ? BASE_URL . '/images/' . $this->view->product['image'] : BASE_URL . '/images/' . 'shopping.webp'; ?>">

</div>


<p style="font-weight: bold; font-size:large;">
    <?php echo $this->view->product['description']?>
</p>

<div class="text-end">
    <a  href="https://wa.me/556194324331?text=<?php echo "Olá tenho interesse em adiquirir esse relógio:  ".BASE_URL."/product?id=".$this->view->product['id']?>" class="btn btn-large btn-success">Quero adiquirir</a>
</div>