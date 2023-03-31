CREATE TABLE vehicle_listings (
    id INT(11) NOT NULL AUTO_INCREMENT,
    vin VARCHAR(255),
    make VARCHAR(255),
    model VARCHAR(255),
    year INT(11),
    price DECIMAL(10,2),
    miles DECIMAL(10,2),
    PRIMARY KEY (id)
);
