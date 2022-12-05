<?php

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        fn_listar_panel_Pago();
        break;
}



function fn_listar_panel_Pago()
{
  if (isset($_REQUEST['Id_usuario'])) {
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
    if (!$link) {
      echo "error al conectar a mysql";
      exit();
    }
    $sql = "SELECT Email from Usuarios where Id_usuario=" . $_REQUEST['Id_usuario'] . "";
    $rs = $link->query($sql);
    $fila = $rs->fetch_assoc();
    $salida = "<div class='checkout-panel'>
    <div class='panel-body'>
      <h2 class='title'>Checkout here!</h2>

      <script type='text/javascript'
      src='https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js'></script>
    
    <script type='text/javascript'>
      emailjs.init('41wlQajnuUJa9k5qv')
    </script>
    
   
      <div class='payment-method'>
        <label for='card' class='method card'>
          <div class='card-logos'>
            <img src='https://designmodo.com/demo/checkout-panel/img/visa_logo.png'/>
            <img src='https://designmodo.com/demo/checkout-panel/img/mastercard_logo.png'/>
          </div>
   
          <div class='radio-input'>
            <input id='card' type='radio' name='payment'>
           Pagar ₡5000
          </div>
        </label>
   
        <label for='paypal' class='method paypal'>
          <img src='https://designmodo.com/demo/checkout-panel/img/paypal_logo.png'/>
          <div class='radio-input'>
            <input id='paypal' type='radio' name='payment'>
            Pagar ₡5000
          </div>
        </label>
      </div>
   
      <div class='input-fields'>
        <div class='column-1'>
          <label for='cardholder'>Name</label>
          <input type='text' id='cardholder' />
   
          <div class='small-inputs'>
            <div>
              <label for='date'>Valid date</label>
              <input type='text' id='date'/>
            </div>
   
            <div>
              <label for='verification'>CVV / CVC *</label>
              <input type='password' id='verification'/>
            </div>
          </div>
   
        </div>
        <div class='column-2'>
          <label for='cardnumber'>Card Number</label>
          <input type='password' id='cardnumber'/>
   
          <span class='info'>* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
        </div>
      </div>
      
    </div>
    <button class='btn next-btn' onclick='Enviar_correo();'>Pagar</button>
  </div>";
  echo $salida;
  }
    
}


?>
