


CREATE TABLE Users
(
	id INT auto_INCREMENT,
	IDCustomer VARCHAR(10),
	username VARCHAR(100),
	email VARCHAR(100),
	PASSWORD VARCHAR(100),
	NAME VARCHAR(100),
	address VARCHAR(200),
	phone INT,
	Birthday DATE,
	LEVEL VARCHAR(50),
	avartar VARCHAR(5000),
	CONSTRAINT PK_Customer PRIMARY KEY(id, IDCustomer)
);



CREATE TABLE Item
(
	id INT auto_INCREMENT,
	IDItem VARCHAR(10),
	NameItem VARCHAR(100),
	Price FLOAT,
	color VARCHAR(100),
	style VARCHAR(100),
	gender VARCHAR(10),
	img VARCHAR(5000),
	infomation VARCHAR(5000),
	detail VARCHAR(1000) ,
	CONSTRAINT PK_Item PRIMARY KEY(id, IDItem)
);



SELECT * FROM top;


CREATE TABLE top
(
	id INT AUTO_INCREMENT PRIMARY KEY ,
	IDItem VARCHAR(10),
	NameItem VARCHAR(100),
	Price FLOAT,
	img VARCHAR(5000),
	CONSTRAINT FK_Top FOREIGN KEY (id, IDItem) REFERENCES Item(id, IDItem)
);





CREATE TABLE favourite
(
	id INT auto_INCREMENT PRIMARY KEY ,
	IDItem VARCHAR(10),
	NameItem VARCHAR(100),
	Price FLOAT,
	img VARCHAR(5000),
	CONSTRAINT FK_favourite FOREIGN KEY (id, IDItem) REFERENCES Item(id, IDItem)
);


CREATE TABLE cart
(
	id INT auto_INCREMENT PRIMARY KEY ,
	IDItem VARCHAR(10),
	NameItem VARCHAR(100),
	price FLOAT,
	quantity INT,
	total FLOAT,
	img VARCHAR(5000),
	information VARCHAR(5000),
	CONSTRAINT FK_cart FOREIGN KEY (id, IDItem) REFERENCES Item(id, IDItem)
);


CREATE TABLE bill
(
	id INT auto_INCREMENT,
	IDBill VARCHAR(10) PRIMARY key,
	IDCustomer VARCHAR(10),
	subTotal FLOAT,
	tax FLOAT,
	shipping FLOAT,
	grandTotal FLOAT,
	CONSTRAINT FK_bill FOREIGN KEY (id, IDCustomer) REFERENCES users(id, IDCustomer)
);



