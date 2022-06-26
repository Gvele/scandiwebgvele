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
                <?php $service->setId($item->id); 
                      $service->setSku($item->sku); 
                      $service->setName($item->name); 
                      $service->setPrice($item->price);  
                      $service->setSystem($item->system);
                      $service->setProductValue($item->value);
                    ?>
                
                <div class="item">
                    <input type="checkbox" id="Product1" class="delete-checkbox" name="products" value="<?php echo $service->getId(); ?>">
                    <p class="prodDescription">
                    <?php echo $service->getSku()?><br>
                    <?php echo $service->getName()?><br>
                    <?php echo $service->getPrice()?> $<br>
                    <?php echo $service->getSystem()?>: <?php echo $service->getProductValue()?><br>
                    </p>
                </div>


                <?php endforeach;?>
        
    </div>
    <div class="line"></div>
    <script src="/assets/js/main.js" ></script>
 
 
