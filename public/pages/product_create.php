 
<div class="header">
      <h2 id="productaddtext">Product Add</h2>
      <div id="buttons">  
        <button id="save" onclick="checker()">Save</button>
        <a href="index.php" id="cancel">Cancel</a>
    </div>
  </div>

  <div class="line"></div>

  <div class="otherInfo">

      <div class="input-control">
        <div class="error"></div>
        <label for=sku>Sku</label>
        <input id="sku" name="sku" placeholder="#sku" type="text" class="inputs" onchange="deleteError(this)" required>
      </div>
    
      <div class="input-control">
        <div class="error"></div>
        <label for="name">Name</label>
        <input id="name" name="name" type="text" placeholder="#name" class="inputs" onchange="deleteError(this)" required>
      </div>
    
    <div class="input-control">
      <div class="error"></div>
      <label for="price">Price ($)</label>
      <input class="inputs" id="price"name="price" type="number" placeholder="#price" onchange="deleteError(this)" required>               
    </div>
  </div>
    
  <div class="typeSwitcherSection">
    <p>Type Switcher</p>
    <section id="wrapper">
      <select id = "productType" id="productType" onchange="displayForm(this)">
        <option value = "typeSwitcher" selected>Type Switcher</option>
        <option value="DVD">DVD</option>
        <option value="Furniture">Furniture</option>
        <option value="Book">Book</option>
      </select>
    </section>
    <div id="selectError">!</div>
    <div id="selectErrorMessage">Please, choose the product and provide data for it.</div>
  </div>
  </div>


  
  <div id="DVD" class="prodform">
<div class="input-control">
    <div class="error"></div>
    <label for="size">Size (MB)</label>
    <input id="size" name="size" type="number" placeholder="#size" class="inputs" onchange="deleteError(this)" required>
   <p id="descriptionsize">Please provide dimensions in MB format, when type: DVD is selected.</p> 
</div>
</div>
    

  <div id="Furniture" class="prodform">
  
<div class="input-control">
  <div class="error"></div>
  <label for="height">Height(CM)</label>
  <input id="height" name="height" type="number" placeholder="#height" class="inputs" onchange="deleteError(this)" required>
</div> 

<div class="input-control">
  <div class="error"></div>
  <label for="width" id="widthtxt">Width(CM)</label>
  <input id="width" name="width" type="number" placeholder="#width" class="inputs" onchange="deleteError(this)" required>
</div> 
  
<div class="input-control">
  <div class="error"></div>
  <label for="length">Length(CM)</label>
  <input id="length" name="length" type="number" placeholder="#length" class="inputs" onchange="deleteError(this)" required>
    </div>
  
  <p id="descriptionfurniture">Please provide dimensions in HxWxL format, when type: Furniture is selected.</p>
</div> 

  <div id="Book" class="prodform">
<div class="input-control">
<div class="error"></div>
<label for="weight">Weight(KG)</label>
<input id="weight" name="weight" type="number" placeholder="weight" class="inputs" onchange="deleteError(this)" required>    
<p id="descriptionbook">Please provide dimensions in KG format, when type: Book is selected.</p>
</div>
</div>

  <div class="footer">
  <div id="linebottom"></div>
  </div>
  <script src="../assets/js/main.js"></script>