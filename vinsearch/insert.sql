LOAD DATA INFILE '/var/www/html/vinsearch/dealix_affiliate_inventory.csv'
INTO TABLE vehicle_listings
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(vin, make, model, year, price, miles);