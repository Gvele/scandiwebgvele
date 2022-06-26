 
//Function to delet al checked boxes
function massDelete(){
  const product_ids=[]; 
  let items = document.getElementsByName('products');
  for (var i = 0; i < items.length; i++) {
    if (items[i].checked == true)
    product_ids.push(items[i].value);
      
  }
  // console.log(product_ids.length);
   
  if (product_ids.length > 0) {
    $.ajax({
      url:"/delete",
      method:"post", 
      data: {product_ids : JSON.stringify(product_ids)},
      success: function(response){
         console.log(response);
            location.reload(true) ;
      }
    })
  }

}

function redirect(){
  $.ajax({
      url:"/create",
    method:"get", 
    success: function(response){
          console.log(response);
           location.href = '/create';
    }
})
 
}


var chosenProdId="typeSwitcher";

//Functions firstValidator da "checker" check if product has been chosen from Typeswitcher, if not they display error message

  const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

  const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}
//With this function if input is filled in it deletes the error code
function deleteError(selectObject){
  let inputfield = document.getElementById(selectObject.id);
    setSuccess(inputfield);
}
//This function checks if any of products has been chosen from typeswitcher
function checker(){
  if(chosenProdId=="typeSwitcher"){ 
    document.getElementById("selectError").style.display="flex";   
    return false;
  }else if(chosenProdId!=="typeSwitcher"){ 
    document.getElementById("selectError").style.display="none";
    firstValidator();
  } 
}

//This functiion validates if all inputs are filled in
function firstValidator(){
  let ar=[];
    // get all the inputs within the submitted form
    var inputs1 = document.getElementsByTagName('input');
 
    for (var i = 0; i < inputs1.length; i++) {
        // only validate the inputs that have the required attribute
        if(inputs1[i].hasAttribute("required")){
            if(inputs1[i].value === ""){

              //console.log(ar.length)
              let username = document.getElementById(inputs1[i].id);
              ar.push(username)
              setError(username, 'Please, submit required data');
            }
            }
        }
  if(ar.length===0){
              addProducts();
              return true;
            }
      return true;
    }

//This function is used to make all products information unrequired. It is used is displayForm(); Function. Later function displayForm(); makes needed inputs required as it is scrolled down and options are chosen.
function makeNotRequired(){
  document.getElementById("size").required=false;
  document.getElementById("height").required=false;
  document.getElementById("width").required=false;
  document.getElementById("length").required=false;
  document.getElementById("weight").required=false;
}



//Function below displays chosen form from Type Switcher and makes all other forms invisible
function displayForm(select){
  let chosenProduct=select.options[select.selectedIndex].value
  for (let element of document.getElementsByClassName("prodform")){
    element.style.display="none";
    makeNotRequired();
  }
 document.getElementById(chosenProduct).style.display = "grid";
 document.getElementById("selectError").style.display="none";
    var values =  document.getElementById(chosenProduct).getElementsByTagName('input');
for (var i = 0; i < values.length; i++) {
    values[i].required = true;
}
  chosenProdId= chosenProduct;
  return chosenProdId;
}

//Function below creates objects, corresponding to each of the product
function addProducts() {

  //The function below creates Object which contains information about User's SKU, Name and Price filled out by user
  function prodDetails() {
    this.sku = document.getElementById("sku").value;
    this.name  = document.getElementById("name").value;
    this.price = document.getElementById("price").value;
  }
  let prodInfo = new prodDetails();
  
  //The function below creates Object which contains information about Furniture size filled out by user
  function furniture() {
    this.type = "Furniture";
      var obj = new Object();
          obj.H = parseInt(document.getElementById("height").value);
          obj.W  = parseInt(document.getElementById("width").value);
          obj.L = parseInt(document.getElementById("length").value);
      var jsonString= JSON.stringify(obj);
    this.properties=jsonString; 
  }
   //The function below creates Object which contains information about DVD size filled out by user
  function dvd() {
    this.type = "DVD";
      var obj = new Object();
          obj.MB = parseInt(document.getElementById("size").value);
      var jsonString= JSON.stringify(obj);
    this.properties  = jsonString;
  }
   //The function below creates Object which contains information about Book weight filled out by user
  function book() {
    this.type = "Book";
      var obj = new Object();
          obj.KG = parseInt(document.getElementById("weight").value);
      var jsonString= JSON.stringify(obj);
    this.properties  = jsonString;
  } 

  //The function below invokes creating Object dinamically based on type which was selected by user  
  var actions ={
    Furniture: function(){
       return new furniture();
    },
    DVD: function(){
      return new dvd();
    },
    Book: function(){
      return  new book();
    }

  }

  var objectMethodName = chosenProdId;
  let calledFunc = actions[objectMethodName](); 

  $.ajax({
      url:"/store",
      method:"post", 
      data: {
              prodInfo  : JSON.stringify(prodInfo),
              calledFunc: JSON.stringify(calledFunc), 
            },
      success: function(response){
            console.log(response);
              location.href = '/';
      }
  })
   


 
};