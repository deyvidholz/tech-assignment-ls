-- Test it online: https://onecompiler.com/mysql/42abk2d6c

-- To get the suppliers located in Victoria that provides Motors for Kombis, we need to join the Supplier table with Supply, Part and Car.
-- Supply: has the CITY column, we need to query it using the value "VITORIA"
-- Part: have the columns NAME_PART and PRICE, we need to query them using "MOTOR" as NAME_PART
-- Car: has the column CAR_CODE, we need to query it using the value "KOMBI"

-- Therefore, the SQL would be something like this:

SELECT 
  s.SUPPLIER_NAME AS Supplier, 
  p.PRICE AS Price
FROM SUPPLIER s
  JOIN SUPPLY sp ON s.SUPPLIER_CODE = sp.SUPPLIER_CODE
  JOIN PART p ON sp.PART_CODE = p.PART_CODE
  JOIN CAR c ON sp.CAR_CODE = c.CAR_CODE
WHERE s.CITY = 'VITORIA'
  AND p.NAME_PART = 'MOTOR'
  AND c.NAME_CAR = 'KOMBI';
  
/*
Output:

+------------+---------+
| Supplier   | Price   |
+------------+---------+
| Volkswagen | 1225.00 |
| BMW        | 1225.00 |
| Honda      | 1299.90 |
+------------+---------+
*/

-- 
-- The code below was used to create the tables and add data to them.
-- If you're gonna use this code below, first create the tables and add data, then you can use the SELECT query.
-- 

-- Create the SUPPLIER table
CREATE TABLE SUPPLIER (
  SUPPLIER_CODE INT PRIMARY KEY,
  SUPPLIER_NAME VARCHAR(100),
  CITY VARCHAR(50)
);

-- Create the PART table
CREATE TABLE PART (
  PART_CODE INT PRIMARY KEY,
  NAME_PART VARCHAR (50),
  PRICE DECIMAL(10, 2)
);

-- Create the CAR table
CREATE TABLE CAR (
  CAR_CODE INT PRIMARY KEY,
  NAME_CAR VARCHAR(50)
);

-- Create the SUPPLY table
CREATE TABLE SUPPLY (
  SUPPLIER_CODE INT,
  PART_CODE INT,
  CAR_CODE INT,
  FOREIGN KEY (SUPPLIER_CODE) REFERENCES SUPPLIER(SUPPLIER_CODE),
  FOREIGN KEY (PART_CODE) REFERENCES PART (PART_CODE),
  FOREIGN KEY (CAR_CODE) REFERENCES CAR(CAR_CODE)
);

-- Insert data into the SUPPLIER table
INSERT INTO SUPPLIER (SUPPLIER_CODE, SUPPLIER_NAME, CITY) VALUES
(1, 'Volkswagen', 'VITORIA'),
(2, 'Mercedez-Benz', 'SYDNEY'),
(3, 'BMW', 'VITORIA'),
(4, 'General Motors', 'MELBOURNE'),
(5, 'Honda', 'VITORIA');

-- Insert data into the PART table
INSERT INTO PART (PART_CODE, NAME_PART, PRICE) VALUES
(1, 'MOTOR', 1225.00),
(2, 'TIRE', 150.00),
(3, 'BATTERY', 250.00),
(4, 'MOTOR', 1299.90),
(5, 'WINDOW', 100.00);

-- Insert data into the CAR table
INSERT INTO CAR (CAR_CODE, NAME_CAR) VALUES
(1, 'KOMBI'),
(2, 'SEDAN'),
(3, 'COUPE'),
(4, 'SUV'),
(5, 'KOMBI');

-- Insert data into the SUPPLY table
INSERT INTO SUPPLY (SUPPLIER_CODE, PART_CODE, CAR_CODE) VALUES
(1, 1, 1),
(3, 1, 5),
(2, 2, 2),
(4, 3, 4),
(5, 4, 5);
