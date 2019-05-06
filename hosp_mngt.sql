-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2019 at 12:17 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdmissionRoom`
--

CREATE TABLE `AdmissionRoom` (
  `RoomNo` char(5) NOT NULL,
  `NoOfBeds` char(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AdmissionRoom`
--

INSERT INTO `AdmissionRoom` (`RoomNo`, `NoOfBeds`) VALUES
('1', '10'),
('2', '20'),
('3', '10'),
('4', '15'),
('5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `AssistantDoctor`
--

CREATE TABLE `AssistantDoctor` (
  `DoctorId` char(25) NOT NULL,
  `worksUnder` char(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AssistantDoctor`
--

INSERT INTO `AssistantDoctor` (`DoctorId`, `worksUnder`) VALUES
('D00003', 'Nikhil'),
('D00004', 'Nikhil');

-- --------------------------------------------------------

--
-- Table structure for table `AssistantDoctor_Operates_Surgery`
--

CREATE TABLE `AssistantDoctor_Operates_Surgery` (
  `DoctorId` char(25) NOT NULL,
  `SurgeryNo` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AssistantDoctor_Operates_Surgery`
--

INSERT INTO `AssistantDoctor_Operates_Surgery` (`DoctorId`, `SurgeryNo`) VALUES
('D00003', 'Sur00001'),
('D00004', 'Sur00001'),
('D00004', 'Sur00002'),
('D00004', 'Sur00003');

-- --------------------------------------------------------

--
-- Table structure for table `Bed`
--

CREATE TABLE `Bed` (
  `BedNo` char(5) NOT NULL,
  `RoomNo` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bed`
--

INSERT INTO `Bed` (`BedNo`, `RoomNo`) VALUES
('1', '1'),
('2', '1'),
('3', '1'),
('4', '1'),
('5', '1'),
('1', '2'),
('10', '2'),
('2', '2'),
('3', '2'),
('4', '2'),
('5', '2'),
('6', '2'),
('7', '2'),
('8', '2'),
('9', '2');

-- --------------------------------------------------------

--
-- Table structure for table `Bill`
--

CREATE TABLE `Bill` (
  `BillNo` char(25) NOT NULL,
  `TotalAmount` int(11) DEFAULT NULL,
  `PatientId` char(25) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bill`
--

INSERT INTO `Bill` (`BillNo`, `TotalAmount`, `PatientId`, `Date`) VALUES
('B00001', 1500, 'PA00002', '2019-04-23'),
('B00002', 5000, 'PA00002', '2019-04-19'),
('B00003', 500, 'PA00002', '2019-05-03'),
('B00004', 25, 'PA00002', '2019-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `DoctorId` char(25) NOT NULL,
  `Type` char(25) DEFAULT NULL,
  `Specialization` char(25) DEFAULT NULL,
  `Surgeon` char(1) DEFAULT NULL,
  `VisitCost` int(11) DEFAULT NULL,
  `PersonId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`DoctorId`, `Type`, `Specialization`, `Surgeon`, `VisitCost`, `PersonId`) VALUES
('D00001', 'expert', 'neurology', '1', 1000, 'P00001'),
('D00002', 'med', 'cardiology', '1', 700, 'P00002'),
('D00003', 'mbbs', 'pediatrition', '1', 800, 'P00003'),
('D00004', 'neurologist', 'brain', '1', 1000, 'P00010');

-- --------------------------------------------------------

--
-- Table structure for table `HeadDoctor`
--

CREATE TABLE `HeadDoctor` (
  `DoctorId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `HeadDoctor`
--

INSERT INTO `HeadDoctor` (`DoctorId`) VALUES
('D00001'),
('D00002');

-- --------------------------------------------------------

--
-- Table structure for table `IPDAppointment`
--

CREATE TABLE `IPDAppointment` (
  `IPDAppointmentId` char(25) NOT NULL,
  `DateOfAdmission` date NOT NULL,
  `RoomNo` char(5) DEFAULT NULL,
  `BedNo` char(5) DEFAULT NULL,
  `PatientId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `IPDAppointment`
--

INSERT INTO `IPDAppointment` (`IPDAppointmentId`, `DateOfAdmission`, `RoomNo`, `BedNo`, `PatientId`) VALUES
('IPD00001', '2019-04-22', '2', '5', 'PA00002'),
('IPD00002', '2019-05-04', '2', '6', 'PA00001');

-- --------------------------------------------------------

--
-- Table structure for table `IPDBill`
--

CREATE TABLE `IPDBill` (
  `BillNo` char(25) NOT NULL,
  `ReceptionistId` char(25) NOT NULL,
  `DoctorId` char(25) NOT NULL,
  `BedNo` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LabBill`
--

CREATE TABLE `LabBill` (
  `BillNo` char(25) NOT NULL,
  `TestId` char(5) DEFAULT NULL,
  `TestDetails` char(200) DEFAULT NULL,
  `ReportPickup` datetime DEFAULT NULL,
  `ReportNo` char(25) NOT NULL,
  `LabInchargeId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LabBill`
--

INSERT INTO `LabBill` (`BillNo`, `TestId`, `TestDetails`, `ReportPickup`, `ReportNo`, `LabInchargeId`) VALUES
('B00003', '001', 'positive', '2019-05-03 00:00:00', 'Rep00003', 'LI00001');

-- --------------------------------------------------------

--
-- Table structure for table `LabIncharge`
--

CREATE TABLE `LabIncharge` (
  `LabInchargeId` char(25) NOT NULL,
  `PersonId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LabIncharge`
--

INSERT INTO `LabIncharge` (`LabInchargeId`, `PersonId`) VALUES
('LI00001', 'P00006');

-- --------------------------------------------------------

--
-- Table structure for table `LabReport`
--

CREATE TABLE `LabReport` (
  `ReportNo` char(25) NOT NULL,
  `TestId` char(5) DEFAULT NULL,
  `Results` char(105) DEFAULT NULL,
  `Remarks` char(200) DEFAULT NULL,
  `LabInchargeId` char(25) NOT NULL,
  `PatientId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LabReport`
--

INSERT INTO `LabReport` (`ReportNo`, `TestId`, `Results`, `Remarks`, `LabInchargeId`, `PatientId`) VALUES
('Rep00003', '001', 'positive', 'not good', 'LI00001', 'PA00002'),
('Rep00004', '004', 'hypermetropia\r\nleft = 1.5\r\nright = 2', 'should eat more veggies', 'LI00001', 'PA00001');

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE `Medicine` (
  `MedicineId` char(25) NOT NULL,
  `MedicineName` char(25) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CompanyName` char(25) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `MedicineType` char(25) DEFAULT NULL,
  `DrugDescription` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Medicine`
--

INSERT INTO `Medicine` (`MedicineId`, `MedicineName`, `Quantity`, `CompanyName`, `Cost`, `MedicineType`, `DrugDescription`) VALUES
('Med00001', 'Nimesulite', 110, 'Zydus', 5, 'Antibiotic', 'good medicine'),
('Med00002', 'Metacine', 50, 'Cadilla', 10, 'Painkiller', 'generic drug'),
('Med00003', 'Crocin', 40, 'Zydus', 15, 'Antibiotic', 'Cures fever'),
('Med00004', 'Abacavir', 30, 'Cadilla', 10, 'Antibiotic', 'Cures cold'),
('Med00005', 'Paracitamol', 100, 'V Care', 3, 'Painkiller', 'cures pain'),
('Med00006', 'Alemtuzumab', 40, 'PMedicines', 20, 'Good Medicine', 'dont know');

-- --------------------------------------------------------

--
-- Table structure for table `Nurse`
--

CREATE TABLE `Nurse` (
  `NurseId` char(25) NOT NULL,
  `PersonId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Nurse`
--

INSERT INTO `Nurse` (`NurseId`, `PersonId`) VALUES
('N00001', 'P00004');

-- --------------------------------------------------------

--
-- Table structure for table `Nurse_Helps_in_Surgery`
--

CREATE TABLE `Nurse_Helps_in_Surgery` (
  `NurseId` char(25) NOT NULL,
  `SurgeryNo` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `OPDAppointment`
--

CREATE TABLE `OPDAppointment` (
  `OPDAppointmentId` char(25) NOT NULL,
  `PatientId` char(25) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OPDAppointment`
--

INSERT INTO `OPDAppointment` (`OPDAppointmentId`, `PatientId`, `Date`) VALUES
('OPD00001', 'PA00002', '2019-04-18'),
('OPD00002', 'PA00001', '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `OPDBill`
--

CREATE TABLE `OPDBill` (
  `BillNo` char(25) NOT NULL,
  `DoctorId` char(25) NOT NULL,
  `ReceptionistId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OPDBill`
--

INSERT INTO `OPDBill` (`BillNo`, `DoctorId`, `ReceptionistId`) VALUES
('B00001', 'D00002', 'R00001'),
('B00002', 'D00001', 'R00001');

-- --------------------------------------------------------

--
-- Table structure for table `OperationTheatre`
--

CREATE TABLE `OperationTheatre` (
  `RoomNo` char(5) NOT NULL,
  `ICU` char(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OperationTheatre`
--

INSERT INTO `OperationTheatre` (`RoomNo`, `ICU`) VALUES
('2', '1'),
('3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `PatientId` char(25) NOT NULL,
  `Height` char(5) NOT NULL,
  `Weight` char(5) NOT NULL,
  `BloodGroup` char(5) DEFAULT NULL,
  `PersonId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`PatientId`, `Height`, `Weight`, `BloodGroup`, `PersonId`) VALUES
('PA00001', '155', '65', 'B+', 'P00008'),
('PA00002', '160', '70', 'A+', 'P00009');

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `PersonId` char(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `MiddleName` varchar(25) DEFAULT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` varchar(105) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `ContactNo` char(12) NOT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`PersonId`, `FirstName`, `LastName`, `MiddleName`, `DateOfBirth`, `Address`, `Gender`, `Description`, `ContactNo`, `Password`) VALUES
('P00001', 'Het', 'Jagani', 'H', '1998-10-14', 'Rajkot', 0, 'good man', '9879219608', '5f4dcc3b5aa765d61d8327deb882cf99'),
('P00002', 'Nikhil', 'Balwani', 'N', '1998-02-10', 'Ahmedabad', 0, 'desc', '1234567890', '5f4dcc3b5aa765d61d8327deb882cf99'),
('P00003', 'Parshwa', 'Shah', 'K', '1998-01-01', 'Ahmedabad', 0, 'desd', '9876543210', '5f4dcc3b5aa765d61d8327deb882cf99'),
('P00004', 'Krupali', 'Mewada', 'H', '1997-05-30', 'ahmedabad', 1, 'dess', '7418529630', '1a1dc91c907325c69271ddf0c944bc72'),
('P00005', 'Shruti', 'Hindocha', 'S', '1998-02-20', 'Ahm', 1, 'sh', '9638527410', '1a1dc91c907325c69271ddf0c944bc72'),
('P00006', 'John', 'Appleseed', 'J', '1990-05-04', 'california', 0, 'heid', '854697123', '1a1dc91c907325c69271ddf0c944bc72'),
('P00007', 'Jake', 'Sparrow', 'J', '1990-05-04', 'new jersey', 0, 'dfdsf', '854697123', '1a1dc91c907325c69271ddf0c944bc72'),
('P00008', 'Kate', 'Smith', 'J', '1990-05-04', 'california', 1, 'heid', '854697123', '1a1dc91c907325c69271ddf0c944bc72'),
('P00009', 'Sachin', 'Tendulkar', 'L ', '1992-06-11', 'Mumbai, Cricket Ground', 0, 'batsman', '9516374285', NULL),
('P00010', 'Biraj', 'Dhaduk', 'P', '1998-09-05', 'Rajkot ', 0, 'none', '7567593939', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `Pharmacist`
--

CREATE TABLE `Pharmacist` (
  `PharmacistId` char(25) NOT NULL,
  `PersonId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Pharmacist`
--

INSERT INTO `Pharmacist` (`PharmacistId`, `PersonId`) VALUES
('PH00001', 'P00007');

-- --------------------------------------------------------

--
-- Table structure for table `PharmacyBill`
--

CREATE TABLE `PharmacyBill` (
  `BillNo` char(25) NOT NULL,
  `PharmacistId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PharmacyBill`
--

INSERT INTO `PharmacyBill` (`BillNo`, `PharmacistId`) VALUES
('B00004', 'PH00001');

-- --------------------------------------------------------

--
-- Table structure for table `PharmacyBill_has_Medicine`
--

CREATE TABLE `PharmacyBill_has_Medicine` (
  `BillNo` char(25) NOT NULL,
  `MedicineId` char(25) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PharmacyBill_has_Medicine`
--

INSERT INTO `PharmacyBill_has_Medicine` (`BillNo`, `MedicineId`, `Quantity`) VALUES
('B00004', 'Med00001', 5),
('B00004', 'Med00003', 15),
('B00004', 'Med00004', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Prescription`
--

CREATE TABLE `Prescription` (
  `ReportNo` char(25) NOT NULL,
  `Details` char(200) DEFAULT NULL,
  `OPDAppointmentId` char(25) NOT NULL,
  `DoctorId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Prescription`
--

INSERT INTO `Prescription` (`ReportNo`, `Details`, `OPDAppointmentId`, `DoctorId`) VALUES
('Rep00001', 'He has fever.\r\nMetacine 1-1-1\r\nWet cloth treatment', 'OPD00001', 'D00003'),
('Rep00002', 'good condition\r\nreduce dosage to 50 mg', 'OPD00002', 'D00001'),
('Rep00005', 'he has a severe fever. Paracitamol 1-1-1 50mg', 'OPD00001', 'D00001'),
('Rep00006', 'high blood pressure. insulin 5mg 1-2-1', 'OPD00001', 'D00001');

-- --------------------------------------------------------

--
-- Table structure for table `Receptionist`
--

CREATE TABLE `Receptionist` (
  `ReceptionistId` char(25) NOT NULL,
  `PersonId` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Receptionist`
--

INSERT INTO `Receptionist` (`ReceptionistId`, `PersonId`) VALUES
('R00001', 'P00005');

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `ReportNo` char(25) NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`ReportNo`, `DATE`) VALUES
('Rep00001', '2019-05-03'),
('Rep00002', '2019-05-03'),
('Rep00003', '2019-05-01'),
('Rep00004', '2019-05-10'),
('Rep00005', '2019-05-01'),
('Rep00006', '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `RoomNo` char(5) NOT NULL,
  `AirConditioned` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`RoomNo`, `AirConditioned`) VALUES
('1', 0),
('2', 1),
('3', 1),
('4', 1),
('5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Serve`
--

CREATE TABLE `Serve` (
  `Date` date NOT NULL,
  `BedNo` char(5) NOT NULL,
  `IPDAppointmentId` char(25) NOT NULL,
  `NurseId` char(25) NOT NULL,
  `RoomNo` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Serve`
--

INSERT INTO `Serve` (`Date`, `BedNo`, `IPDAppointmentId`, `NurseId`, `RoomNo`) VALUES
('2019-05-06', '3', 'IPD00001', 'N00001', '1'),
('2019-05-04', '5', 'IPD00001', 'N00001', '2'),
('2019-05-04', '6', 'IPD00002', 'N00001', '2');

-- --------------------------------------------------------

--
-- Table structure for table `Surgery`
--

CREATE TABLE `Surgery` (
  `SurgeryNo` char(25) NOT NULL,
  `DoctorId` char(25) NOT NULL,
  `RoomNo` char(5) NOT NULL,
  `IPDAppointmentID` char(25) NOT NULL,
  `DateOfAdmission` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Surgery`
--

INSERT INTO `Surgery` (`SurgeryNo`, `DoctorId`, `RoomNo`, `IPDAppointmentID`, `DateOfAdmission`) VALUES
('Sur00001', 'D00002', '2', 'IPD00001', '2019-04-22'),
('Sur00002', 'D00001', '2', 'IPD00002', '2019-05-04'),
('Sur00003', 'D00001', '2', 'IPD00002', '2019-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdmissionRoom`
--
ALTER TABLE `AdmissionRoom`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `AssistantDoctor`
--
ALTER TABLE `AssistantDoctor`
  ADD PRIMARY KEY (`DoctorId`),
  ADD UNIQUE KEY `DoctorId_UNIQUE` (`DoctorId`);

--
-- Indexes for table `AssistantDoctor_Operates_Surgery`
--
ALTER TABLE `AssistantDoctor_Operates_Surgery`
  ADD PRIMARY KEY (`DoctorId`,`SurgeryNo`),
  ADD KEY `fk_AssistantDoctor_has_Surgery_Surgery1_idx` (`SurgeryNo`),
  ADD KEY `fk_AssistantDoctor_has_Surgery_AssistantDoctor1_idx` (`DoctorId`);

--
-- Indexes for table `Bed`
--
ALTER TABLE `Bed`
  ADD PRIMARY KEY (`BedNo`,`RoomNo`),
  ADD KEY `fk_Bed_AdmissionRoom1_idx` (`RoomNo`);

--
-- Indexes for table `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`BillNo`),
  ADD KEY `fk_Bill_Patient1_idx` (`PatientId`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`DoctorId`),
  ADD UNIQUE KEY `PersonId_UNIQUE` (`PersonId`),
  ADD KEY `fk_Doctor_Person_idx` (`PersonId`);

--
-- Indexes for table `HeadDoctor`
--
ALTER TABLE `HeadDoctor`
  ADD PRIMARY KEY (`DoctorId`),
  ADD UNIQUE KEY `DoctorId_UNIQUE` (`DoctorId`),
  ADD KEY `fk_HeadDoctor_Doctor1_idx` (`DoctorId`);

--
-- Indexes for table `IPDAppointment`
--
ALTER TABLE `IPDAppointment`
  ADD PRIMARY KEY (`IPDAppointmentId`),
  ADD KEY `fk_IPDAppointment_Patient1_idx` (`PatientId`);

--
-- Indexes for table `IPDBill`
--
ALTER TABLE `IPDBill`
  ADD PRIMARY KEY (`BillNo`,`BedNo`),
  ADD KEY `fk_IPDBill_Receptionist1_idx` (`ReceptionistId`),
  ADD KEY `fk_IPDBill_Doctor1_idx` (`DoctorId`),
  ADD KEY `fk_IPDBill_Bed1_idx` (`BedNo`);

--
-- Indexes for table `LabBill`
--
ALTER TABLE `LabBill`
  ADD PRIMARY KEY (`BillNo`),
  ADD KEY `fk_LabBill_LabReport1_idx` (`ReportNo`),
  ADD KEY `fk_LabBill_LabIncharge1_idx` (`LabInchargeId`),
  ADD KEY `BillNo` (`BillNo`);

--
-- Indexes for table `LabIncharge`
--
ALTER TABLE `LabIncharge`
  ADD PRIMARY KEY (`LabInchargeId`),
  ADD UNIQUE KEY `Person_PersonId_UNIQUE` (`PersonId`),
  ADD KEY `fk_LabIncharge_Person1_idx` (`PersonId`);

--
-- Indexes for table `LabReport`
--
ALTER TABLE `LabReport`
  ADD PRIMARY KEY (`ReportNo`),
  ADD KEY `fk_LabReport_LabIncharge1_idx` (`LabInchargeId`),
  ADD KEY `fk_LabReport_Patient1_idx` (`PatientId`);

--
-- Indexes for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD PRIMARY KEY (`MedicineId`);

--
-- Indexes for table `Nurse`
--
ALTER TABLE `Nurse`
  ADD PRIMARY KEY (`NurseId`),
  ADD UNIQUE KEY `PersonId_UNIQUE` (`PersonId`),
  ADD KEY `fk_Nurse_Person1_idx` (`PersonId`);

--
-- Indexes for table `Nurse_Helps_in_Surgery`
--
ALTER TABLE `Nurse_Helps_in_Surgery`
  ADD PRIMARY KEY (`NurseId`,`SurgeryNo`),
  ADD KEY `fk_Nurse_has_Surgery_Surgery1_idx` (`SurgeryNo`),
  ADD KEY `fk_Nurse_has_Surgery_Nurse1_idx` (`NurseId`);

--
-- Indexes for table `OPDAppointment`
--
ALTER TABLE `OPDAppointment`
  ADD PRIMARY KEY (`OPDAppointmentId`),
  ADD KEY `fk_OPDAppointment_Patient1_idx` (`PatientId`);

--
-- Indexes for table `OPDBill`
--
ALTER TABLE `OPDBill`
  ADD PRIMARY KEY (`BillNo`),
  ADD KEY `fk_OPDBill_Doctor1_idx` (`DoctorId`),
  ADD KEY `fk_OPDBill_Receptionist1_idx` (`ReceptionistId`);

--
-- Indexes for table `OperationTheatre`
--
ALTER TABLE `OperationTheatre`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`PatientId`),
  ADD KEY `fk_Patient_Person1_idx` (`PersonId`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`PersonId`);

--
-- Indexes for table `Pharmacist`
--
ALTER TABLE `Pharmacist`
  ADD PRIMARY KEY (`PharmacistId`),
  ADD KEY `fk_Pharmacist_Person1_idx` (`PersonId`);

--
-- Indexes for table `PharmacyBill`
--
ALTER TABLE `PharmacyBill`
  ADD PRIMARY KEY (`BillNo`),
  ADD KEY `fk_PharmacyBill_Pharmacist1_idx` (`PharmacistId`);

--
-- Indexes for table `PharmacyBill_has_Medicine`
--
ALTER TABLE `PharmacyBill_has_Medicine`
  ADD PRIMARY KEY (`BillNo`,`MedicineId`),
  ADD KEY `fk_PharmacyBill_has_Medicine_Medicine1_idx` (`MedicineId`),
  ADD KEY `fk_PharmacyBill_has_Medicine_PharmacyBill1_idx` (`BillNo`);

--
-- Indexes for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD PRIMARY KEY (`ReportNo`,`OPDAppointmentId`,`DoctorId`),
  ADD UNIQUE KEY `ReportNo_UNIQUE` (`ReportNo`),
  ADD KEY `fk_Prescription_OPDAppointment1_idx` (`OPDAppointmentId`),
  ADD KEY `fk_Prescription_Doctor1_idx` (`DoctorId`);

--
-- Indexes for table `Receptionist`
--
ALTER TABLE `Receptionist`
  ADD PRIMARY KEY (`ReceptionistId`),
  ADD UNIQUE KEY `PersonId_UNIQUE` (`PersonId`),
  ADD KEY `fk_Receptionist_Person1_idx` (`PersonId`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`ReportNo`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`RoomNo`);

--
-- Indexes for table `Serve`
--
ALTER TABLE `Serve`
  ADD PRIMARY KEY (`Date`,`BedNo`,`IPDAppointmentId`,`NurseId`,`RoomNo`),
  ADD KEY `fk_Serve_Bed1_idx` (`BedNo`),
  ADD KEY `fk_Serve_IPDPatient1_idx` (`IPDAppointmentId`),
  ADD KEY `fk_Serve_Nurse1_idx` (`NurseId`),
  ADD KEY `fk_Serve_AdmissionRoom1_idx` (`RoomNo`);

--
-- Indexes for table `Surgery`
--
ALTER TABLE `Surgery`
  ADD PRIMARY KEY (`SurgeryNo`),
  ADD KEY `fk_Surgery_HeadDoctor1_idx` (`DoctorId`),
  ADD KEY `fk_Surgery_OperationTheatre1_idx` (`RoomNo`),
  ADD KEY `fk_Surgery_IPDPatient1_idx` (`IPDAppointmentID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AdmissionRoom`
--
ALTER TABLE `AdmissionRoom`
  ADD CONSTRAINT `fk_AdmissionRoom_Room1` FOREIGN KEY (`RoomNo`) REFERENCES `Room` (`RoomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `AssistantDoctor`
--
ALTER TABLE `AssistantDoctor`
  ADD CONSTRAINT `fk_AssistantDoctor_Doctor1` FOREIGN KEY (`DoctorId`) REFERENCES `Doctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `AssistantDoctor_Operates_Surgery`
--
ALTER TABLE `AssistantDoctor_Operates_Surgery`
  ADD CONSTRAINT `fk_AssistantDoctor_has_Surgery_AssistantDoctor1` FOREIGN KEY (`DoctorId`) REFERENCES `AssistantDoctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AssistantDoctor_has_Surgery_Surgery1` FOREIGN KEY (`SurgeryNo`) REFERENCES `Surgery` (`SurgeryNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `fk_Bill_Patient1` FOREIGN KEY (`PatientId`) REFERENCES `Patient` (`PatientId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD CONSTRAINT `fk_Doctor_Person` FOREIGN KEY (`PersonId`) REFERENCES `Person` (`PersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `HeadDoctor`
--
ALTER TABLE `HeadDoctor`
  ADD CONSTRAINT `fk_HeadDoctor_Doctor1` FOREIGN KEY (`DoctorId`) REFERENCES `Doctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `IPDAppointment`
--
ALTER TABLE `IPDAppointment`
  ADD CONSTRAINT `fk_IPDAppointment_Patient1` FOREIGN KEY (`PatientId`) REFERENCES `Patient` (`PatientId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `IPDBill`
--
ALTER TABLE `IPDBill`
  ADD CONSTRAINT `fk_IPDBill_Bed1` FOREIGN KEY (`BedNo`) REFERENCES `Bed` (`BedNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_IPDBill_Bill1` FOREIGN KEY (`BillNo`) REFERENCES `Bill` (`BillNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_IPDBill_Doctor1` FOREIGN KEY (`DoctorId`) REFERENCES `Doctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_IPDBill_Receptionist1` FOREIGN KEY (`ReceptionistId`) REFERENCES `Receptionist` (`ReceptionistId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `LabBill`
--
ALTER TABLE `LabBill`
  ADD CONSTRAINT `LabBill_ibfk_1` FOREIGN KEY (`ReportNo`) REFERENCES `LabReport` (`ReportNo`),
  ADD CONSTRAINT `fk_LabBill_Bill1` FOREIGN KEY (`BillNo`) REFERENCES `Bill` (`BillNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LabBill_LabIncharge1` FOREIGN KEY (`LabInchargeId`) REFERENCES `LabIncharge` (`LabInchargeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `LabIncharge`
--
ALTER TABLE `LabIncharge`
  ADD CONSTRAINT `fk_LabIncharge_Person1` FOREIGN KEY (`PersonId`) REFERENCES `Person` (`PersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `LabReport`
--
ALTER TABLE `LabReport`
  ADD CONSTRAINT `fk_LabReport_LabIncharge1` FOREIGN KEY (`LabInchargeId`) REFERENCES `LabIncharge` (`LabInchargeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LabReport_Patient1` FOREIGN KEY (`PatientId`) REFERENCES `Patient` (`PatientId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LabReport_Report1` FOREIGN KEY (`ReportNo`) REFERENCES `Report` (`ReportNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Nurse`
--
ALTER TABLE `Nurse`
  ADD CONSTRAINT `fk_Nurse_Person1` FOREIGN KEY (`PersonId`) REFERENCES `Person` (`PersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Nurse_Helps_in_Surgery`
--
ALTER TABLE `Nurse_Helps_in_Surgery`
  ADD CONSTRAINT `fk_Nurse_has_Surgery_Nurse1` FOREIGN KEY (`NurseId`) REFERENCES `Nurse` (`NurseId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nurse_has_Surgery_Surgery1` FOREIGN KEY (`SurgeryNo`) REFERENCES `Surgery` (`SurgeryNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `OPDAppointment`
--
ALTER TABLE `OPDAppointment`
  ADD CONSTRAINT `fk_OPDAppointment_Patient1` FOREIGN KEY (`PatientId`) REFERENCES `Patient` (`PatientId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `OPDBill`
--
ALTER TABLE `OPDBill`
  ADD CONSTRAINT `fk_OPDBill_Bill1` FOREIGN KEY (`BillNo`) REFERENCES `Bill` (`BillNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OPDBill_Doctor1` FOREIGN KEY (`DoctorId`) REFERENCES `Doctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OPDBill_Receptionist1` FOREIGN KEY (`ReceptionistId`) REFERENCES `Receptionist` (`ReceptionistId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `OperationTheatre`
--
ALTER TABLE `OperationTheatre`
  ADD CONSTRAINT `fk_OperationTheatre_Room1` FOREIGN KEY (`RoomNo`) REFERENCES `Room` (`RoomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `fk_Patient_Person1` FOREIGN KEY (`PersonId`) REFERENCES `Person` (`PersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Pharmacist`
--
ALTER TABLE `Pharmacist`
  ADD CONSTRAINT `fk_Pharmacist_Person1` FOREIGN KEY (`PersonId`) REFERENCES `Person` (`PersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PharmacyBill`
--
ALTER TABLE `PharmacyBill`
  ADD CONSTRAINT `fk_PharmacyBill_Bill1` FOREIGN KEY (`BillNo`) REFERENCES `Bill` (`BillNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PharmacyBill_Pharmacist1` FOREIGN KEY (`PharmacistId`) REFERENCES `Pharmacist` (`PharmacistId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PharmacyBill_has_Medicine`
--
ALTER TABLE `PharmacyBill_has_Medicine`
  ADD CONSTRAINT `PharmacyBill_has_Medicine_ibfk_1` FOREIGN KEY (`MedicineId`) REFERENCES `Medicine` (`MedicineId`),
  ADD CONSTRAINT `fk_PharmacyBill_has_Medicine_PharmacyBill1` FOREIGN KEY (`BillNo`) REFERENCES `PharmacyBill` (`BillNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD CONSTRAINT `fk_Prescription_Doctor1` FOREIGN KEY (`DoctorId`) REFERENCES `Doctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prescription_OPDAppointment1` FOREIGN KEY (`OPDAppointmentId`) REFERENCES `OPDAppointment` (`OPDAppointmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prescription_Report1` FOREIGN KEY (`ReportNo`) REFERENCES `Report` (`ReportNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Receptionist`
--
ALTER TABLE `Receptionist`
  ADD CONSTRAINT `fk_Receptionist_Person1` FOREIGN KEY (`PersonId`) REFERENCES `Person` (`PersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Serve`
--
ALTER TABLE `Serve`
  ADD CONSTRAINT `fk_Serve_AdmissionRoom1` FOREIGN KEY (`RoomNo`) REFERENCES `Bed` (`RoomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Serve_Bed1` FOREIGN KEY (`BedNo`) REFERENCES `Bed` (`BedNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Serve_IPDPatient1` FOREIGN KEY (`IPDAppointmentId`) REFERENCES `IPDAppointment` (`IPDAppointmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Serve_Nurse1` FOREIGN KEY (`NurseId`) REFERENCES `Nurse` (`NurseId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Surgery`
--
ALTER TABLE `Surgery`
  ADD CONSTRAINT `fk_Surgery_HeadDoctor1` FOREIGN KEY (`DoctorId`) REFERENCES `HeadDoctor` (`DoctorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Surgery_IPDPatient1` FOREIGN KEY (`IPDAppointmentID`) REFERENCES `IPDAppointment` (`IPDAppointmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Surgery_OperationTheatre1` FOREIGN KEY (`RoomNo`) REFERENCES `OperationTheatre` (`RoomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
