CREATE TABLE Patient (
patient_id INT PRIMARY KEY,
first_name VARCHAR(50),
last_name VARCHAR(50),
phone VARCHAR(20),
DOB DATE,
email VARCHAR(50),
insurance_provider VARCHAR(50)
);

CREATE TABLE Doctor (
doc_id INT PRIMARY KEY,
email VARCHAR(50),
license VARCHAR(20) UNIQUE,
clinic_name VARCHAR(50),
phone VARCHAR(20),
last_name VARCHAR(50),
first_name VARCHAR(50)
);

CREATE TABLE Medicine (
med_id INT PRIMARY KEY,
ndc_code VARCHAR(11) UNIQUE,
med_name VARCHAR(50),
strength VARCHAR(20),
dosage_form VARCHAR(20)
);

CREATE TABLE Supplier (
supp_id INT PRIMARY KEY,
supp_name VARCHAR(30),
address VARCHAR(50),
phone VARCHAR(20),
email VARCHAR(50)
);

CREATE TABLE Prescription (
presc_id INT PRIMARY KEY,
status VARCHAR(10),
date_presc DATE,
quantity INT,
refills INT,
patient_id INT,
doc_id INT,
med_id INT,
FOREIGN KEY (patient_id) REFERENCES Patient(patient_id),
FOREIGN KEY (doc_id) REFERENCES Doctor(doc_id),
FOREIGN KEY (med_id) REFERENCES Medicine(med_id)
);

CREATE TABLE Supply (
supp_id INT,
med_id INT,
cost DECIMAL(10,2),
lead_time INT,
PRIMARY KEY (supp_id, med_id),
FOREIGN KEY (supp_id) REFERENCES Supplier(supp_id),
FOREIGN KEY (med_id) REFERENCES Medicine(med_id)
);
