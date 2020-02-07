CREATE TABLE user(

	user_id SERIAL PRIMARY KEY,
    lastname VARCHAR(25),
    firstname VARCHAR(25),
    email VARCHAR(255),
    psswd VARCHAR(32),
    sex VARCHAR(1),
    address VARCHAR(50),
    city VARCHAR(20),
    postal_code VARCHAR (5),
    brth_date DATE,
    phone_number VARCHAR(10),
    register_date DATE
); 