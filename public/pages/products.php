     <div class="header">
        <h2>Product List</h2> 
        <div class="buttons">  
            <!-- <button  class="ADD"   onclick="redirect()" >ADD</button> -->
            <a href="/create"  id="ADD">ADD</a>
            <input type="submit" id="massDelete" value="MASS DELETE" onclick="massDelete()" />  
        </div>
    </div>
    <div class="line"></div>
    <div class="container">
                <?php foreach ($products as $item): ?>
                <?php $product->setId($item->id); 
                      $product->setSku($item->sku); 
                      $product->setName($item->name); 
                      $product->setPrice($item->price);  
                      $product->setSystem($item->system);
                      $product->setProductValue($item->value);
                    ?>
                
                <div class="item">
                    <input type="checkbox" id="Product1" class="delete-checkbox" name="products" value="<?php echo $product->getId(); ?>">
                    <p class="prodDescription">
                    <?php echo  $product->getSku()?><br>
                    <?php echo $product->getName()?><br>
                    <?php echo $product->getPrice()?> $<br>
                    <?php echo $product->getSystem()?>: <?php echo $product->getProductValue()?><br>
                    </p>
                </div>


                <?php endforeach;?>
        
    </div>
    <div class="line"></div>
    <script src="/assets/js/main.js" ></script>
 
 
