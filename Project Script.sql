     create table RECEPTION (
     ReceptID Integer Not Null Unique,
     ReceptDept VarChar(20) Not Null,
     ReceptLoc VarChar(20) Not Null,
     ReceptPhone CHAR(10) NOT NULL,
     Primary Key (ReceptID));


     create table PATIENT (
     pMRN Integer Not Null Unique,
     pPhone CHAR(10) NOT NULL,
     pInsure VARCHAR(35) NOT NULL,
     pAddress VarChar(35) NOT NULL,
     pLName VarChar(15) NOT NULL,
     pFName VarChar(15) NOT NULL,
     pSSN VarChar(9) NOT NULL,
     pDOB VarChar(15) NOT NULL,
     pAge CHAR(3) NOT NULL,
     procID VarChar(20) NOT NULL,
     drID varChar(20) Not Null,
     Primary Key (pMRN),
     Foreign Key (ProcID) References PROC (ProcID),
     Foreign Key (drID) References DOCTOR (drID)); 

     create table DEPARTMENT (
     DeptID Integer Not Null Unique,
     DeptName VarChar(30) NOT NULL,
     DeptHead VarChar(35) Not Null,
     Primary Key (DeptID));

     create table ROOM (
     roomNum Integer Not Null Unique,
     roomType VarChar(35) NOT NULL,
     pMRN Integer Not Null,
     nurseID Integer Not Null,
     Primary Key (roomNum),
     Foreign Key (pMRN) References PATIENT (pMRN),
     Foreign Key (nurseID) References NURSE (nurseID)); 

     create table MEDICINE (
     medID VarChar(20) NOT NULL Unique,
     medName VarChar(35) NOT NULL,
     medPrice decimal(8,2) NOT NULL,
     medDosage varChar(15) NOT NULL,
     expDate Date NOT NULL,
     medAmount VarChar(25) NOT NULL,
     Primary Key (medID));

     create table DOCTOR (
     drID varChar(20) NOT NULL Unique,
     drLName VarChar(15) NOT NULL,
     drFName VarChar(15) NOT NULL,
     DeptID Integer Not Null,
     drSalary decimal(8,2) NOT NULL,
     drAddress VarChar(35) NOT NULL,
     drSpecialty VarChar(35) NOT NULL,
     drAge CHAR(3) NOT NULL,
     Primary Key (drID),
     Foreign Key (DeptID) References DEPARTMENT (DEPTID));

     create table PROC (
     procID VarChar(20) NOT NULL Unique,
     pMRN Integer Not Null,
     drID varChar(20) NOT NULL Unique,
     procDesc varChar(30) NOT NULL,
     procCost decimal(8,2) NOT NULL,
     Primary Key (procID),
     Foreign Key (pMRN) References PATIENT (pMRN),
     Foreign Key (drID) References DOCTOR (drID));

     create table APPOINTMENT (
     apID Integer NOT NULL UNIQUE,
     DeptID Integer Not Null,
     apDesc varChar(30) NOT NULL,
     procID VarChar(20) NOT NULL,
     roomNum Integer Not Null,
     apDate Date NOT NULL,
     apTime Time NOT NULL,
     pMRN Integer Not Null,
     Primary Key (apID),
     Foreign Key (DeptID) References DEPARTMENT (DeptID),
     Foreign Key (procID) References PROC (procID),
     Foreign Key (roomNum) References ROOM (roomNum),
     Foreign Key (pMRN) References PATIENT (pMRN));

     create table NURSE (
     nurseID Integer NOT NULL UNIQUE, 
     nurseLName VarChar(15) NOT NULL,
     nurseFName VarChar(15) NOT NULL,
     DeptID Integer Not Null,
     nurseSalary decimal(8,2) NOT NULL,
     nurseAddress VarChar(35) NOT NULL,
     nurseAge CHAR(3) NOT NULL,
     Primary Key (nurseID),
     Foreign Key (DeptID) References DEPARTMENT (DeptID));
 
     create table PRESCRIPTION (
     rxID varChar(10) NOT NULL UNIQUE,
     pMRN Integer Not Null,
     drID varChar(20) NOT NULL,
     rxCost decimal(8,2) NOT NULL,
     medID VarChar(20) NOT NULL,
     Primary Key (rxID),
     Foreign Key (drID) References DOCTOR (drID),
     Foreign Key (medID) References MEDICINE (medID));
