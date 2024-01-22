CREATE DATABASE IF NOT EXISTS loginpage;

USE loginpage;

CREATE TABLE Account (
    AccountID int AUTO_INCREMENT,
    Username varchar(255) UNIQUE,
    HashPassword varchar(255),
    Mail varchar(255),
    Name varchar(255),
    FirstName varchar(255),
    AccessRights int,
    PRIMARY KEY (AccountID),
    CHECK (AccessRights = 99 OR AccessRights = 100 OR AccessRights = 101)
);

CREATE TABLE Building (
    BuildingID int AUTO_INCREMENT,
    Name varchar(255),
    Photo varchar(255),
    Size float(7,1),
    Address varchar(255),
    PRIMARY KEY (BuildingID)

);


CREATE TABLE Apartment (
    ApartmentID int AUTO_INCREMENT,
    Name varchar(255),
    Number int,
    NumberOfPeople int,
    Photo varchar(255),
    BuildingID int,
    AccountID int,
    PRIMARY KEY (ApartmentID),
    FOREIGN KEY (BuildingID) REFERENCES Building(BuildingID),
    FOREIGN KEY (AccountID) REFERENCES Account(AccountID)

);

CREATE TABLE Room (
    RoomID int AUTO_INCREMENT,
    Name varchar(255),
    Photo varchar(255),
    ApartmentID int,
    PRIMARY KEY (RoomID),
    FOREIGN KEY (ApartmentID) REFERENCES Apartment(ApartmentID)

);

CREATE TABLE DeviceType (
    DeviceTypeID int AUTO_INCREMENT,
    Name varchar(255),
    Unit varchar(255),
    Photo varchar(255),
    PRIMARY KEY (DeviceTypeID)

);

CREATE TABLE Device (
    DeviceID int AUTO_INCREMENT,
    Name varchar(255),
    State binary,
    Value float(3,1),
    RoomID int,
    DeviceTypeID int,
    PRIMARY KEY (DeviceID),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID),
    FOREIGN KEY (DeviceTypeID) REFERENCES DeviceType(DeviceTypeID)

);


CREATE TABLE DeviceHistory (
    DeviceHistoryID int AUTO_INCREMENT,
    State binary,
    Value float(3,1),
    DateTime timestamp,
    DeviceID int,
    PRIMARY KEY (DeviceHistoryID),
    FOREIGN KEY (DeviceID) REFERENCES Device(DeviceID)

);

CREATE TABLE SensorType (
    SensorTypeID int AUTO_INCREMENT,
    Name varchar(255),
    Unit varchar(255),
    Photo varchar(255),
    PRIMARY KEY (SensorTypeID)

);

CREATE TABLE Sensor (
    SensorID int AUTO_INCREMENT,
    Name varchar(255),
    MiniValue float(4,1),
    MaxiValue float(4,1),
    RoomID int,
    SensorTypeID int,
    PRIMARY KEY (SensorID),
    FOREIGN KEY (SensorTypeID) REFERENCES SensorType(SensorTypeID),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID)

);



CREATE TABLE Mesurement (
    MesurementID int AUTO_INCREMENT,
    Value float(4,1),
    DateTime timestamp,
    SensorID int,
    PRIMARY KEY (MesurementID),
    FOREIGN KEY (SensorID) REFERENCES Sensor(SensorID)

);

CREATE TABLE Person (
    PersonID int AUTO_INCREMENT,
    Name varchar(255),
    FirstName varchar(255),
    Email varchar(255),
    ApartmentID int,
    PRIMARY KEY (PersonID),
    FOREIGN KEY (ApartmentID) REFERENCES Apartment(ApartmentID)
);

CREATE TABLE PersonAccount (
    PersonAccountID int AUTO_INCREMENT,
    PersonID int,
    AccountID int,
    PRIMARY KEY (PersonAccountID),
    FOREIGN KEY (PersonID) REFERENCES Person(PersonID),
    FOREIGN KEY (AccountID) REFERENCES Account(AccountID)

);

CREATE TABLE SensorDescp (
    SensorID INTEGER,
    Description VARCHAR(255),
    FOREIGN KEY (SensorID) REFERENCES Sensor(SensorID)
);

CREATE TABLE Message (
    MessageID int AUTO_INCREMENT,
    Text varchar(255),
    AccountID int,
    DateTime timestamp,
    PRIMARY KEY (MessageID),
    FOREIGN KEY (AccountID) REFERENCES Account(AccountID)
);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("admin", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "admin@domisep" , "Admin", "First", 100);
