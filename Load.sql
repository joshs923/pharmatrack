-- =========================
-- INSERT DATA (ORDER MATTERS)
-- =========================

-- 1. Patient
INSERT INTO Patient VALUES
(1, 'John', 'Doe', '111-111-1111', '1990-01-01', 'john@email.com', 'Aetna'),
(2, 'Jane', 'Smith', '222-222-2222', '1985-05-10', 'jane@email.com', 'BlueCross');

-- 2. Doctor
INSERT INTO Doctor VALUES
(1, 'mike@clinic.com', 'LIC123', 'Health Clinic', '333-333-3333', 'Brown', 'Mike'),
(2, 'sarah@clinic.com', 'LIC456', 'Care Center', '444-444-4444', 'Lee', 'Sarah');

-- 3. Medicine
INSERT INTO Medicine VALUES
(1, 'NDC001', 'Ibuprofen', '200mg', 'Tablet'),
(2, 'NDC002', 'Amoxicillin', '500mg', 'Capsule');

-- 4. Supplier
INSERT INTO Supplier VALUES
(1, 'PharmaSupply Co', '123 Main St', '555-111-2222', 'supply@email.com'),
(2, 'MediDistrib', '456 Oak St', '555-333-4444', 'medi@email.com');

-- 5. Prescription (AFTER parent tables)
INSERT INTO Prescription VALUES
(1, 'Active', '2026-04-01', 30, 2, 1, 1, 1),
(2, 'Completed', '2026-04-02', 20, 0, 2, 2, 2);
-- 6. Supply (LAST)
INSERT INTO Supply VALUES
(1, 1, 5.50, 3),
(2, 2, 12.00, 5);
