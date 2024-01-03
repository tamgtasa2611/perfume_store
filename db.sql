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

CREATE TABLE product_types (
	id INT auto_increment,
    type_name VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE countries (
	id INT auto_increment,
    country_name VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE sizes (
	id INT auto_increment,
    size INT,
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
    type_id INT,
    country_id INT,
    gender_id INT,
    brand_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (size_id) REFERENCES sizes(id),
    FOREIGN KEY (type_id) REFERENCES product_types(id),
    FOREIGN KEY (country_id) REFERENCES countries(id),
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
("D&G");

INSERT INTO genders(gender_name) VALUES
("Male"),
("Female"),
("Unisex");

INSERT INTO product_types(type_name) VALUES
("Common"),
("Unique");

INSERT INTO countries(country_name) VALUES
("United States"),
("Korea"),
("Italy"),
("China"),
("Japan");

INSERT INTO sizes(size) VALUES
(30),
(50),
(100),
(125);

INSERT INTO products(product_name, quantity, price, description, image, size_id, type_id, country_id, gender_id, brand_id) VALUES
("Product 1", 10, 49.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 1, 1, 1, 1, 1),
("Product 2", 10, 69.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 2, 2, 2, 2, 2),
("Product 3", 10, 100.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 3, 1, 1, 3, 2),
("Product 4", 10, 89.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 4, 1, 3, 3, 1),
("Product 5", 10, 79.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 1, 2, 1, 1, 1),
("Product 6", 10, 29.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 2, 1, 4, 3, 3),
("Product 7", 10, 159.99, "", "https://mediacdn.livestory.io/v1/armani/posts/r1000/6349244778f58e000b07e6a8.png.webp", 3, 2, 1, 2, 2);