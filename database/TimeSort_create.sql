-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-06-10 12:44:44.473

-- tables
-- Table: Homework
CREATE TABLE Homework (
    Homework_ID int NOT NULL AUTO_INCREMENT,
    Teacher_Subject_Teacher_Subject_ID int NOT NULL,
    Homework_Title varchar(100) NOT NULL,
    Homework_Description varchar(1000) NOT NULL,
    Homework_Entry date NOT NULL,
    CONSTRAINT Homework_pk PRIMARY KEY (Homework_ID)
);

-- Table: Institute
CREATE TABLE Institute (
    Institute_ID int NOT NULL,
    Institute_name varchar(50) NOT NULL,
    CONSTRAINT Institution_pk PRIMARY KEY (Institute_ID)
);

-- Table: Student
CREATE TABLE Student (
    Student_ID int NOT NULL AUTO_INCREMENT,
    Firstname varchar(50) NOT NULL,
    Lastname varchar(50) NOT NULL,
    Birthday date NOT NULL,
    Phone_Number varchar(50) NOT NULL,
    TLU_EMail varchar(50) NOT NULL,
    Personal_EMail varchar(50) NOT NULL,
    Username varchar(50) NOT NULL,
    CONSTRAINT Student_Information_pk PRIMARY KEY (Student_ID)
);

-- Table: Student_Entry
CREATE TABLE Student_Entry (
    Student_Entry_ID int NOT NULL,
    Homework_Homework_ID int NOT NULL,
    Student_Institute_Student_Institute_ID int NOT NULL,
    Time_Spent time NOT NULL,
    Time_Entry date NOT NULL,
    CONSTRAINT Student_Entry_pk PRIMARY KEY (Student_Entry_ID)
);

-- Table: Student_Institute
CREATE TABLE Student_Institute (
    Student_Institute_ID int NOT NULL,
    Student_Student_ID int NOT NULL,
    Institute_Institute_ID int NOT NULL,
    CONSTRAINT Student_ID PRIMARY KEY (Student_Institute_ID)
);

-- Table: Subject
CREATE TABLE Subject (
    Subject_ID int NOT NULL,
    Institute_Institute_ID int NOT NULL,
    Subject_Name varchar(50) NOT NULL,
    CONSTRAINT Subject_pk PRIMARY KEY (Subject_ID)
);

-- Table: Teacher
CREATE TABLE Teacher (
    Teacher_ID int NOT NULL AUTO_INCREMENT,
    Firstname varchar(50) NOT NULL,
    Lastname varchar(50) NOT NULL,
    Birthday date NOT NULL,
    Phone_Number varchar(50) NOT NULL,
    TLU_EMail varchar(50) NOT NULL,
    Personal_EMail varchar(50) NOT NULL,
    Username varchar(50) NOT NULL,
    CONSTRAINT Teacher_Information_pk PRIMARY KEY (Teacher_ID)
);

-- Table: Teacher_Institute
CREATE TABLE Teacher_Institute (
    Teacher_ID int NOT NULL,
    Teacher_Teacher_ID int NOT NULL,
    Institute_Institute_ID int NOT NULL,
    CONSTRAINT Teachers_pk PRIMARY KEY (Teacher_ID)
);

-- Table: Teacher_Subject
CREATE TABLE Teacher_Subject (
    Teacher_Subject_ID int NOT NULL,
    Subject_Subject_ID int NOT NULL,
    Teacher_Teacher_ID int NOT NULL,
    CONSTRAINT Teacher_Subject_pk PRIMARY KEY (Teacher_Subject_ID)
);

-- foreign keys
-- Reference: Homework_Teacher_Subject (table: Homework)
ALTER TABLE Homework ADD CONSTRAINT Homework_Teacher_Subject FOREIGN KEY Homework_Teacher_Subject (Teacher_Subject_Teacher_Subject_ID)
    REFERENCES Teacher_Subject (Teacher_Subject_ID);

-- Reference: Student_Entry_Homework (table: Student_Entry)
ALTER TABLE Student_Entry ADD CONSTRAINT Student_Entry_Homework FOREIGN KEY Student_Entry_Homework (Homework_Homework_ID)
    REFERENCES Homework (Homework_ID);

-- Reference: Student_Entry_Student_Institute (table: Student_Entry)
ALTER TABLE Student_Entry ADD CONSTRAINT Student_Entry_Student_Institute FOREIGN KEY Student_Entry_Student_Institute (Student_Institute_Student_Institute_ID)
    REFERENCES Student_Institute (Student_Institute_ID);

-- Reference: Student_Institute_Institute (table: Student_Institute)
ALTER TABLE Student_Institute ADD CONSTRAINT Student_Institute_Institute FOREIGN KEY Student_Institute_Institute (Institute_Institute_ID)
    REFERENCES Institute (Institute_ID);

-- Reference: Student_Institute_Student (table: Student_Institute)
ALTER TABLE Student_Institute ADD CONSTRAINT Student_Institute_Student FOREIGN KEY Student_Institute_Student (Student_Student_ID)
    REFERENCES Student (Student_ID);

-- Reference: Subject_Institute (table: Subject)
ALTER TABLE Subject ADD CONSTRAINT Subject_Institute FOREIGN KEY Subject_Institute (Institute_Institute_ID)
    REFERENCES Institute (Institute_ID);

-- Reference: Teacher_Gives_Subject (table: Teacher_Subject)
ALTER TABLE Teacher_Subject ADD CONSTRAINT Teacher_Gives_Subject FOREIGN KEY Teacher_Gives_Subject (Subject_Subject_ID)
    REFERENCES Subject (Subject_ID);

-- Reference: Teacher_Institute_Institute (table: Teacher_Institute)
ALTER TABLE Teacher_Institute ADD CONSTRAINT Teacher_Institute_Institute FOREIGN KEY Teacher_Institute_Institute (Institute_Institute_ID)
    REFERENCES Institute (Institute_ID);

-- Reference: Teacher_Institute_Teacher (table: Teacher_Institute)
ALTER TABLE Teacher_Institute ADD CONSTRAINT Teacher_Institute_Teacher FOREIGN KEY Teacher_Institute_Teacher (Teacher_Teacher_ID)
    REFERENCES Teacher (Teacher_ID);

-- Reference: Teacher_Subject_Teacher (table: Teacher_Subject)
ALTER TABLE Teacher_Subject ADD CONSTRAINT Teacher_Subject_Teacher FOREIGN KEY Teacher_Subject_Teacher (Teacher_Teacher_ID)
    REFERENCES Teacher (Teacher_ID);

-- End of file.

