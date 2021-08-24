CREATE TABLE BookInventoryOrder(
orderid INT PRIMARY KEY auto_increment,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
book_name VARCHAR(100) NOT NULL,
paymentoption VARCHAR(10) NOT NULL
);