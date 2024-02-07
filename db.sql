CREATE DATABASE perfumestore;
USE perfumestore;

CREATE TABLE brands (
	id INT auto_increment,
    brand_name VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE genders (
	id INT auto_increment,
    gender_name VARCHAR(13),
    PRIMARY KEY (id)
);

CREATE TABLE categories (
	id INT auto_increment,
    category_name VARCHAR(100),
    description TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE seasons (
	id INT auto_increment,
    season_name VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE sizes (
	id INT auto_increment,
    size_name INT,
    PRIMARY KEY (id)
);

CREATE TABLE products (
	id INT auto_increment,
    product_name VARCHAR(255),
    quantity INT,
    price FLOAT,
    description TEXT,
    image TEXT,
    size_id INT,
    category_id INT,
    season_id INT,
    gender_id INT,
    brand_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (size_id) REFERENCES sizes(id),
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (season_id) REFERENCES seasons(id),
    FOREIGN KEY (gender_id) REFERENCES genders(id),
    FOREIGN KEY (brand_id) REFERENCES brands(id)
);

CREATE TABLE admins (
	id INT auto_increment,
    email VARCHAR(255) unique,
    password VARCHAR(255),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    phone_number VARCHAR(13),
    level INT,
    PRIMARY KEY (id)
);

CREATE TABLE customers (
	id INT auto_increment,
    email VARCHAR(255) unique,
    password VARCHAR(255),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    phone_number VARCHAR(13),
    address TEXT,
    status INT(1),
    PRIMARY KEY (id)
);

CREATE TABLE payment_methods (
	id INT auto_increment,
    method_name VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE orders (
	id INT auto_increment,
    order_date DATETIME,
    order_status INT,
	receiver_name VARCHAR(255),
    receiver_phone VARCHAR(13),
    receiver_address TEXT,
    admin_id INT,
    customer_id INT,
    method_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (admin_id) REFERENCES admins(id),
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (method_id) REFERENCES payment_methods(id)
);

CREATE TABLE orders_details (
	order_id INT,
    product_id INT,
    sold_price FLOAT,
    sold_quantity INT,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

/*================================================================*/

INSERT INTO brands(brand_name) VALUES
("Dior"),
("Chanel"),
("Giorgio Armani"),
("Gucci"),
("Tom Ford"),
("D&G");

INSERT INTO genders(gender_name) VALUES
("Male"),
("Female"),
("Unisex");

INSERT INTO categories(category_name) VALUES
("Parfum"),
("Eau de Parfum"),
("Eau de Toilette"),
("Eau de Cologne"),
("Eau Fraiche"),
("Perfume Oil"),
("Body Mists");

INSERT INTO seasons(season_name) VALUES
("Spring"),
("Summer"),
("Autumn"),
("Winter");

INSERT INTO sizes(size_name) VALUES
(25),
(30),
(50),
(100),
(125),
(200);

INSERT INTO products(product_name, quantity, price, description, image, size_id, category_id, season_id, gender_id, brand_id) VALUES
("ACQUA DI GIOIA", 100, 200, "", "images/products/product_1.webp", 2, 2, 3, 2, 5),
("PLATINUM", 100, 88, "", "images/products/product_2.webp", 3, 5, 1, 3, 1),
("SAUVAGE ELIXIR", 100, 49, "", "images/products/product_3.webp", 4, 4, 3, 2, 6);