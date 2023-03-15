<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PK Store</title>
</head>
<body>

	<div class = "container-fluid">
		<div class="row">
			<?php
				session_start();
				include("ADMINcp/Config/config.php");
				include("Pages/header.php");
				include("Pages/menu.php");	
				include("Pages/main.php");	
				include("Pages/footer.php");	
			?>		
		</div>
	</div>
</body>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">

		$(document).ready(function() {

		  var back = $(".prev");
		  var next = $(".next");
		  var steps = $(".step");

		  next.bind("click", function() {
		    $.each(steps, function(i) {
		      if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
		        $(steps[i]).addClass('current');
		        $(steps[i - 1]).removeClass('current').addClass('done');
		        return false;
		      }
		    })
		  });
		  back.bind("click", function() {
		    $.each(steps, function(i) {
		      if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
		        $(steps[i + 1]).removeClass('current');
		        $(steps[i]).removeClass('done').addClass('current');
		        return false;
		      }
		    })
		  });

		})
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	
	<script src="https://www.paypal.com/sdk/js?client-id=Aek7YNlOMWI3Aws9pP-60KpLG1eksNe8q5vx0IpsPbUOFjMhieWlljFnjBbE1l8egYvqAHIK8ut9oOmZ&currency=USD"></script>
	
	<script>

      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        style: {
		    layout:  'vertical',
		    color:   'gold',
		    shape:   'pill',
		    label:   'paypal'
		  },
        createOrder: (data, actions) => {
        	var tongtien = document.getElementById('tongtien').value;
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: tongtien // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            window.location.replace('http://localhost:8888/Web_PHP/index.php?quanly=camon&thanhtoan=paypal');
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        },
        onCancle:function(data){
        	window.location.replace('http://localhost:8888/Web_PHP/index.php?quanly=thongtinthanhtoan');
        }
      }).render('#paypal-button-container');
    </script>

	
</html>
