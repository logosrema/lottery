<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    <style>
.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

#buttons-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

button {
  margin: 5px;
  padding: 10px 20px;
  font-size: 18px;
  border: none;
  border-radius: 5px;
  background-color: #EEE;
}

button.active {
  background-color: #00BFFF;
  color: #FFF;
}

#input-box {
  width: 200px;
  height: 40px;
  font-size: 18px;
  text-align: center;
  border: none;
  border-radius: 5px;
  background-color: #ccc;
  margin: 0 auto;
  position:relative;
  left :40%;
}
#action-buttons {
 /* / display: flex; */
  justify-content: space-around;
  width: 100%;
  position:relative;
  left :35%;

}

#clear-button,
#submit-button,
#random-button {
  margin-top: 50px;
  padding: 10px 20px;
  font-size: 18px;
  border: none;
  border-radius: 5px;
  background-color: #EEE;
}

#clear-button:hover,
#submit-button:hover,
#random-button:hover {
  cursor: pointer;
  background-color: #00BFFF;
  color: #FFF;
}



    </style>
</head>
<body>
    

<div id="buttons-container">
  <button>0</button>
  <button>1</button>
  <button>2</button>
  <button>3</button>
  <button>4</button>
  <button>5</button>
  <button>6</button>
  <button>7</button>
  <button>8</button>
  <button>9</button>
</div>

<input type="text" id="input-box" />
<div id="action-buttons">
    <button id="clear-button">Bet</button>
    <button id="submit">Draw</button>
    <button id="random">CheckWin</button>
  </div>

<hr>

<table border="1" style=" position:relative;
  left :15%;width:70%;text-align:center;">
  <tr>
    <th>BetDate</th>
    <th>BetTime</th>
    <th>DrawPeriod</th>
    <th>DrawNumber</th>
    <th>DrawState</th>
    <th>UserBet</th>
    <th>Uid</th>
    <tbody>
      <?php
      include "tableClass.php";
      $table = new TableClass;
      $data = $table->getUserBets();
     // echo "<pre>";
     // print_r($data);
     $count = 0;
      foreach($data as $row){
        $color = "";
        $count++;
        if($count % 2 === 1){
          $color = "#eee";
        }else{
          $color = "#fff";
        }
        ?> 
         <tr style="background-color:<?=$color?>">
            <td><?=$row['betdate']?></td>
            <td><?=$row['bettime']?></td>
            <td><?=$row['draw_period']?></td>
            <td><?=$row['draw_number']?></td>
            <td><?=$row['betstatus']?></td>
            <td><?=$row['userbet']?></td>
            <td><?=$row['uid']?></td>
          </tr>
        <?php
      }

      ?>
    </tbody>
  </tr>
</table>








  <script src= "js/jquery.min.js"></script>

<script>

// Get the buttons container and the input box
const buttonsContainer = document.getElementById('buttons-container');
const inputBox = document.getElementById('input-box');

// Create an empty array to store the selected button's text
const selectedButtonArray = [];

// Add a click event listener to the buttons container
buttonsContainer.addEventListener('click', function(event) {
  // Check if the clicked element is a button
  if (event.target.tagName === 'BUTTON') {
    // Get the text of the clicked button
    const buttonText = event.target.textContent;
    
    // Add the text to the selected button array
    selectedButtonArray.push(buttonText);
    
    // Add the 'active' class to the clicked button
    event.target.classList.add('active');
    
    // Put the selected button array values in the input box
    inputBox.value = selectedButtonArray.join(',');
  }
});

// Function to remove the 'active' class from all buttons
function removeAllActiveClasses() {
  const buttons = document.getElementsByTagName('button');
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove('active');
  }
}

// Add a click event listener to the window to remove the 'active' class from all buttons when the user clicks anywhere else
window.addEventListener('click', function(event) {
  if (event.target.tagName !== 'BUTTON') {
    removeAllActiveClasses();
  }
});

// Example array with all the digits from 0 to 9
const exampleArray = [0,1,2,3,4,5,6,7,8,9];

// Log the selected button array to the console
console.log(selectedButtonArray);
// Get the "Clear" button element
const clearButton = document.querySelector('#clear-button');

// Add an event listener to the button
clearButton.addEventListener('click', function() {
  // Get the input box element and its value
  const inputBox = document.querySelector('#input-box');
  const betnumber = inputBox.value;

    $.post("getBetclass.php",{
      betnumber:betnumber

    }, function(data){
      alert(data)
      window.location.href="index.php";
    })

});

 $("#submit").click(function(){

    alert("")

 })

 
 $("#random").click(function(){
  $.post("checkClass.php",{

  },function(data){
    console.log(data)
  //  window.location.href="index.php";

  })

})






</script>
</body>
</html>