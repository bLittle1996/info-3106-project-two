-- created using mySQL syntax
USE ben_littleton_pizza;
SET foreign_key_checks = 0;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS pizza_topping;
DROP TABLE IF EXISTS toppings;
DROP TABLE IF EXISTS cheeses;
DROP TABLE IF EXISTS sauces;
DROP TABLE IF EXISTS doughs;
DROP TABLE IF EXISTS pizzas;
DROP TABLE IF EXISTS users;
SET foreign_key_checks = 1;


CREATE TABLE users (
	id int primary key auto_increment,
    name varchar(255),
    email varchar(255) unique,
    city varchar(255),
    province varchar(255),
    address varchar(255),
    postal_code varchar(255)
);

CREATE TABLE orders (
	id int primary key auto_increment,
    user_id int,
    total_price decimal(10,2),
	city varchar(255),
    province varchar(255),
    address varchar(255),
    postal_code varchar(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE toppings(
	id int primary key auto_increment,
    name varchar(255) unique
);

CREATE TABLE cheeses(
	id int primary key auto_increment,
    name varchar(255) unique
);

CREATE TABLE sauces(
	id int primary key auto_increment,
    name varchar(255) unique
);

CREATE TABLE doughs(
	id int primary key auto_increment,
    name varchar(255) unique
);

CREATE TABLE pizzas (
	id int primary key auto_increment,
    order_id int null,
    cheese_id int,
    sauce_id int,
    dough_id int,
    price decimal(5,2),
    FOREIGN KEY (cheese_id) REFERENCES cheeses(id) ON DELETE CASCADE,
    FOREIGN KEY (sauce_id) REFERENCES sauces(id) ON DELETE CASCADE,
    FOREIGN KEY (dough_id) REFERENCES doughs(id) ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

CREATE TABLE pizza_topping(
	id int primary key auto_increment,
    pizza_id int,
    topping_id int,
    FOREIGN KEY (pizza_id) REFERENCES pizzas(id) ON DELETE CASCADE,
    FOREIGN KEY (topping_id) REFERENCES toppings(id) ON DELETE CASCADE
);

INSERT INTO doughs (name) values ("Regular");
INSERT INTO doughs (name) values ("Thick");
INSERT INTO doughs (name) values ("Thin");

INSERT INTO cheeses (name) values ("Regular");
INSERT INTO cheeses (name) values ("Parmesan");
INSERT INTO cheeses (name) values ("Provolone");
INSERT INTO cheeses (name) values ("None");

INSERT INTO sauces (name) values ("Regular");
INSERT INTO sauces (name) values ("Extra Saucy");
INSERT INTO sauces (name) values ("Actual Poison");
INSERT INTO sauces (name) values ("Garlic");
INSERT INTO sauces (name) values ("Light");
INSERT INTO sauces (name) values ("None");

INSERT INTO toppings (name) values ("Pepperoni");
INSERT INTO toppings (name) values ("Ham");
INSERT INTO toppings (name) values ("Mild Sausage");
INSERT INTO toppings (name) values ("Hot Sausage");
INSERT INTO toppings (name) values ("Spicy Meatball");
INSERT INTO toppings (name) values ("Green Pepper");
INSERT INTO toppings (name) values ("Red Pepper");
INSERT INTO toppings (name) values ("Black Olive");
INSERT INTO toppings (name) values ("Beetle");
INSERT INTO toppings (name) values ("Pineapple");
INSERT INTO toppings (name) values ("Running Out of Ideas");

