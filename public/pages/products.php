     <div class="header">
        <h2>Product List</h2> 
        <div class="buttons">  
            <input type="submit" id="addProduct" value="ADD" onclick="redirect();" />
            <input type="submit" id="massDelete" value="MASS DELETE" onclick="massDelete();" />  
        </div>
    </div>
    <div class="line"></div>
    <div class="container">
                <?php foreach ($data['products'] as $product): ?>
                <div class="item">
                    <input type="checkbox" id="Product1" class="delete-checkbox" name="products" value="<?php echo $product->id; ?>">
                    <p class="prodDescription">
                    <?php echo $product->sku?><br>
                    <?php echo $product->name?><br>
                    <?php echo $product->price?> $<br>
                    <?php echo $product->system?>: <?php echo $product->value?><br>
                    </p>
                </div>
                <?php endforeach;?>
        
    </div>
    <div class="line"></div>
    <script src="../public/assets/js/main.js" ></script>
 
 
