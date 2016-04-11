<?php
	$myConn = mysqli_connect( "localhost:3306" , "" , "" , "" );
	if( !$myConn )
	{
		die( "FAILED -> " . mysqli_connect_error( $myConn ) );
	}


	$sqlTable = "CREATE TABLE customers(
			     id INT AUTO_INCREMENT PRIMARY KEY 
			     )ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );


	$sqlTable = "CREATE TABLE categories(
				 id INT AUTO_INCREMENT PRIMARY KEY,
				 name VARCHAR(75) NOT NULL ,
				 merchID INT NOT NULL
				 )ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );


	$sqlTable = "CREATE TABLE merchandise( 
					id INT AUTO_INCREMENT PRIMARY KEY 
					)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE logins( 
				 	id INT AUTO_INCREMENT PRIMARY KEY ,
				 	username VARCHAR(50) NOT NULL,
				 	password VARCHAR(75) NOT NULL,
				 	customerID INT NOT NULL
				 	)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE persons( 
					id INT AUTO_INCREMENT PRIMARY KEY ,
					fname VARCHAR(30) NOT NULL,
					lname VARCHAR(30) NOT NULL,
					city VARCHAR(30) NOT NULL, 
					street VARCHAR(30) NOT NULL,
					zip VARCHAR(10) NOT NULL ,
					phone VARCHAR(10) NOT NULL ,
					customerID INT NOT NULL
					)ENGINE=INNDOB";	
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE orders(
					orderID INT AUTO_INCREMENT PRIMARY KEY ,
					orderDate TIMESTAMP ,
					total FLOAT NOT NULL
					)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE personOrder(
					poCustomer INT NOT NULL,
					poOrder INT NOT NULL
					)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE products(
					id INT AUTO_INCREMENT PRIMARY KEY ,
					prodTitle VARCHAR(50) NOT NULL ,
					prodDescription TEXT NOT NULL ,
					price FLOAT NOT NULL ,
					categoryID INT NOT NULL,
					image TEXT 
					)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE productAmt( 
					productID INT NOT NULL , 
					quantity INT NOT NULL ,
					customerID INT NOT NULL  ,
					categoryID INT NOT NULL 
					)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );

	$sqlTable = "CREATE TABLE sessionVars( 
					customerID INT NOT NULL , 
					logID INT NOT NULL , 
					logName VARCHAR(50) NOT NULL , 
					personID INT NOT NULL , 
					orderID INT NOT NULL 
					)ENGINE=INNODB";
	$result = mysqli_query( $myConn , $sqlTable );


	// $sqlAlter = "ALTER TABLE categories 
	// 			 ADD CONSTRAINT fk_merch_cat
	// 			 FOREIGN KEY( merchID )
	// 			 REFERENCES merchandise( id )
	// 			 ON DELETE CASCADE ON UPDATE CASCADE";

	


	// $sqlAlter2 = "ALTER TABLE logins 
	// 				ADD CONSTRAINT fk_customer_login
	// 				FOREIGN KEY( customerID )
	// 				REFERENCES customers( id )
	// 				ON UPDATE CASCADE";


	// $sqlAlter3 = "ALTER TABLE persons 
	// 				ADD CONSTRAINT fk_customer_person
	// 				FOREGIN KEY( customerID )
	// 				REFERENCES customers( id )
	// 				ON UPDATE CASCADE";

	// $sqlAlter4 = "ALTER TABLE personOrder
	// 				ADD CONSTRAINT fk_order
	// 				FOREIGN KEY( poOrder )
	// 				REFERENCES orders( orderID )
	// 				ON DELETE CASCADE 
	// 				ON UPDATE CASCADE";

	// $sqlAlter5 = "ALTER TABLE personOrder 
	// 				ADD CONSTRAINT fk_person 
	// 				FOREIGN KEY( poCustomer )
	// 				REFERENCES persons( id )
	// 				ON DELETE CASCADE 
	// 				ON UPDATE CASCADE";








?>
