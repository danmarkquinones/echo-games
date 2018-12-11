<?php
	session_start();
	require_once("connect.php");
//How to generate Transaction Number
	function generate_new_transaction_number(){
		$ref_number = "";
		$source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
		for($i=0 ; $i<6 ; $i++){
			$index = rand(0,15); //generates a random number given the range.
			$ref_number .= $source[$index]; //concatenate/append a random character from the source array
		}
		$today = getdate(); //Seconds since Unix Epoch
		return $ref_number . "-" . $today[0];
	}
//get all details of the order
	$user_id = $_SESSION['user']['id'];
	$purchase_date = date("Y-m-d G:i:s");
	$payment_mode_id = 1; //Cash On Delivery
	$status_id = 1; //pending
	$delivery_address = $_POST['addressLine'];
	$transaction_code = generate_new_transaction_number();
	$cart_total = 0;
	foreach ($_SESSION['cart'] as $id => $qty) {
		$cart_total_query = "SELECT * FROM items WHERE id = $id";
		$result = mysqli_query($conn, $cart_total_query);
		$item_info = mysqli_fetch_assoc($result);
		$cart_total += ($qty * $item_info['price']);
	}
	// echo "User wgo ordered: ". $user_id;
	// echo "Purchased date: ". $purchase_date;
	// echo "Delivery address: ". $delivery_address;
	// echo "Transaction code: ". $transaction_code;
	// echo "Amount to pay: ". $cart_total;

	//IPASOK SA DATABASE
	$sql_query = "INSERT INTO orders(user_id, transaction_code, purchase_date, total, status_id, payment_mode_id) VALUES ('$user_id', '$transaction_code' , '$purchase_date' , '$cart_total', '$status_id', '$payment_mode_id' )";
	$result = mysqli_query($conn , $sql_query);

	//get the id of the newly created order
	$new_order_id = mysqli_insert_id($conn); //retrieves the most created id.

	//insert values to the orders_items table using the $new_order_id
	if($result){ //if the order is created
		foreach ($_SESSION['cart'] as $id => $qty) {
			// $sql_query = "SELECT*FROM items WHERE id = $id ";
			// $result = mysqli_query($conn, $sql_query);
			// $item_info mysqli_fetch_assoc($result);
			//use this if you need other info from the items table.

			//create a new entry for orders_items
			$sql = "INSERT INTO orders_items(order_id,item_id,quantity) VALUES ('$new_order_id', '$id', '$qty')";
			$result = mysqli_query($conn,$sql);
		}
	}

	//clear the cart
	$_SESSION['cart'] = [];
	mysqli_close($conn);

//PHPMAILER!!!!!
	//send email notif to customer
	use PHPMailer\PHPMailer\PHPMailer; // sending emails
	use PHPMailer\PHPMailer\Exception; // error checking
	//Import phpmailer classes into  namespace

	//Loads composers autoloader
	require "../vendor/autoload.php";

	$mail = new PHPMailer(true); // creates a new instances of phpmailer with the exceptions enabled;
	$staff_email = "danquin090715@gmail.com"; //this is the email you created;

	// $cutomer_email = $_SESSION['user']['email'];
	$customer_email = "roxannejeanvillanueva@gmail.com";
	$subject = "Echo Games - Order Confirmation";
	$body = "<div style='text-transform:uppercase;'>
			<h3>Reference Number:" . $transaction_code . "</h3></div>"."<div>Ship to $delivery_address </div>";

	try{
		//Server settings
		//$mail->SMTPDebug = 4; //Enables verbose debug output  need to comment out para ma redirect
		$mail->isSMTP(); //Set mailet to use SMTP
		$mail->Host = "smtp.gmail.com"; // Specifies the SMTP servers to use
		$mail->SMTPAuth = true; //Enables SMTP authentication
		$mail->Username = $staff_email; //SMTP username
		$mail->Password = "pogiako143"; //SMTP password
		$mail->SMTPSecure = "tls"; //Enables TLS encryption,'ssl is also accepted'
		$mail->Port = 587; //SMTP servers port to allow us to send mails.

		//Sender and Recipient
		$mail->setFrom($staff_email, "Echo Games"); //aliasing the sender
		$mail->addAddress($customer_email); //who the recipient willl be

		//content
		$mail->isHTML(true); //sets email format to HTML
		$mail->subject = $subject;
		$mail->Body = $body;

		//sending the actual email
		$mail->send();
		$_SESSION['txn_number'] = $transaction_code;
		$_SESSION['address'] = $delivery_address;
		header("Location: ../views/confirmation.php");
	}catch (Exception $e){
		echo "Message could not be sent. Mailer Error: ", $mail->ErrorInfo;
	}
?>