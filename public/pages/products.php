     <div class="header">
        <h2>Product List</h2> 
        <div class="buttons">  
            <input type="submit" id="addProduct" value="ADD" onclick="redirect();" />
            <input type="submit" id="massDelete" value="MASS DELETE" onclick="massDelete();" />  
        </div>
    </div>
    <div class="line"></div>
    <div class="container">
                <?php foreach ($products as $item): ?>
                <div class="item">
                    <input type="checkbox" id="Product1" class="delete-checkbox" name="products" value="<?php echo $item->id; ?>">
                    <p class="prodDescription">
                    <?php echo $item->sku?><br>
                    <?php echo $item->name?><br>
                    <?php echo $item->price?> $<br>
                    <?php echo $item->system?>: <?php echo $item->value?><br>
                    </p>
                </div>
                <?php endforeach;?>
        
    </div>
    <div class="line"></div>
    <script src="/assets/js/main.js" ></script>
 
 
