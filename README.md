# DOMISEP
Project for the A2 Course of PBL

Create Tables:
```
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
    IdNumber int,
    PRIMARY KEY (PersonID)

);

CREATE TABLE PersonAccount (
    PersonAccountID int AUTO_INCREMENT,
    PersonID int,
    AccountID int,
    PRIMARY KEY (PersonAccountID),
    FOREIGN KEY (PersonID) REFERENCES Person(PersonID),
    FOREIGN KEY (AccountID) REFERENCES Account(AccountID)

);

INSERT INTO Building (Name, Photo, Size, Address)
VALUES ("A", "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg", 3000.2, "4 rue Napoleon");

INSERT INTO Building (Name, Photo, Size, Address)
VALUES ("B", "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg", 6000.1, "4 rue Noir");

INSERT INTO Building (Name, Photo, Size, Address)
VALUES ("C", "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg", 5996, "4 rue Blanche");

INSERT INTO Building (Name, Photo, Size, Address)
VALUES ("D", "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg", 9098, "4 rue Blue");

INSERT INTO Building (Name, Photo, Size, Address)
VALUES ("E", "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg", 9090, "4 rue Vert");

INSERT INTO Building (Name, Photo, Size, Address)
VALUES ("F", "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg", 4321.4, "4 rue Chien");


INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A1", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A1", "XYZ", 101);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A2", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A2", "XYZ", 100);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A3", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A3", "XYZ", 101);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A4", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A4", "XYZ", 100);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A5", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A5", "XYZ", 100);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A6", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A6", "XYZ", 100);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A7", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A7", "XYZ", 100);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A8", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A8", "XYZ", 99);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A9", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A9", "XYZ", 99);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A10", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A10", "XYZ", 100);

INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights)
VALUES ("A11", "$2y$10$qPXEC7YrjiNHTBTbJhxUPuj4Euqn0.sYy8VDFX90GSKOY4lT0Qnmy", "@" , "A11", "XYZ", 101);




INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Janvier", 11, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1, 9);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Fevrier", 12, 1, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1, 5);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Mars", 14, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1, 3);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Avril", 10, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2, 2);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Mai", 11, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2, 1);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Juin", 19, 5, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3, 7);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Julliet", 10, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3, 4);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Aout", 10, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4, 2);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Septembre", 14, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4, 1);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Octobre", 5, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5, 10);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Novembre", 21, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5, 11);

INSERT INTO Apartment (Name, Number, NumberOfPeople, Photo, BuildingID, AccountID)
VALUES ("Decembre", 1, 4, "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5, 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 1);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Livin room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 2);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 3);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 4);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 5);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 6);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 6);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 6);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 6);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 6);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 6);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 7);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 7);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 7);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 7);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 7);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 7);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Livin room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 8);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Livin room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 9);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Livin room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 10);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Livin room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 11);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bathroom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 12);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Living room", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 12);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("WC", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 12);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedrooom", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 12);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Bedroom 2", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 12);

INSERT INTO Room (Name, Photo, ApartmentID)
VALUES ("Kitchen", "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg", 12);



INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Thermostat X400", "Celsius", "../assets/devices/thermostat.png");

INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Thermostat X600", "Celsius", "../assets/devices/thermostat.png");

INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Light m67y", "Watt", "../assets/devices/desk-lamp.png");

INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Light eR43", "Watt", "../assets/devices/light-bulb.png");

INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Light o900", "Watt", "../assets/devices/light-bulb.png");

INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Air purifier e390", "%", "../assets/devices/air-purifier.png");

INSERT INTO DeviceType (Name, Unit, Photo)
VALUES ("Window coltrol x45", "%", "../assets/devices/window.png");



INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 1, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 2, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 3, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 4, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 5, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 6, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 7, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 8, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 9, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 10, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 12, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 13, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 14, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18,15, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 16, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 17, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 18, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 19, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 20, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 21, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18.2, 22, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 23, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 24, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 6.3, 25, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 26, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 27, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 28, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 29, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 19., 30, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 31, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18.2, 32, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 33, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 34, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 6.3, 35, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 36, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 37, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 38, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 39, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 19., 40, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 41, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 44, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 6.3, 45, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 46, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 47, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 48, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 54, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 6.3, 55, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 56, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 57, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 58, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18.2, 62, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 63, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 18, 64, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 6.3, 65, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 66, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 67, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 68, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 22.3, 69, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 19., 70, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 0, 0, 71, 1);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 19.2, 72, 2);

INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
VALUES ("name", 1, 27.3, 73, 1);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 19.3, CURRENT_TIMESTAMP, 2);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 1);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 4);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 60);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 52);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 21, CURRENT_TIMESTAMP, 22);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22, CURRENT_TIMESTAMP, 25);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 55);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 43);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 54);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18,CURRENT_TIMESTAMP, 33);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 60);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 21);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 52);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 61);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 34);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 31);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18.2, CURRENT_TIMESTAMP, 51);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 13);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 22);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 6.3, CURRENT_TIMESTAMP, 27);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 18);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 52);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 61);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 25.3, CURRENT_TIMESTAMP, 60);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 19., CURRENT_TIMESTAMP, 40);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 53);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18.2, CURRENT_TIMESTAMP, 34);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 22);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 19);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 3);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 7);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 19.5, CURRENT_TIMESTAMP, 54);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 58);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 48);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 19., CURRENT_TIMESTAMP, 49);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 55);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 51);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 50);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 46);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 55);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 59);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 8, CURRENT_TIMESTAMP, 54);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 16.3, CURRENT_TIMESTAMP, 62);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 31);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 35);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 42);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 41);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 33);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 18, CURRENT_TIMESTAMP, 39);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 6.3, CURRENT_TIMESTAMP, 38);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 22.3, CURRENT_TIMESTAMP, 20);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 5.3, CURRENT_TIMESTAMP, 20);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 11);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 12.3, CURRENT_TIMESTAMP, 12);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 19.4, CURRENT_TIMESTAMP, 22);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (0, 0, CURRENT_TIMESTAMP, 10);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 29.2, CURRENT_TIMESTAMP, 29);

INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
VALUES (1, 21.3, CURRENT_TIMESTAMP, 61);


INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Tempreture TemP7", "Celsius", "../assets/sensors/temperature.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Humidity 999x", "%", "../assets/sensors/humidity.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Water usage 5X7", "Liter", "../assets/resources/water.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Window state superX2", "%", "../assets/sensors/window.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Smoke detector 77x", "%", "../assets/sensors/fire-sensor.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Air clarity e390", "%", "../assets/sensors/air-quality.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Gas leak control M566", "%", "../assets/sensors/natural-gas.png");

INSERT INTO SensorType (Name, Unit, Photo)
VALUES ("Electricty usage X200", "kWh", "../assets/resources/electricity.png");


INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 1.0, 50.0, 1, 1);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 20, 40, 1, 2);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 300.0, 5, 3);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 50, 2, 6);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 6, 5);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 13, 5);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 19, 5);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 1.0, 50.0, 15, 1);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 20, 40, 13, 2);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 300.0, 55, 3);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 50, 62, 6);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 26, 5);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 1.0, 50.0, 45, 1);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 20, 40, 23, 2);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 300.0, 65, 3);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 50, 55, 6);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 56, 5);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 1.0, 50.0, 18, 1);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 20, 40, 53, 2);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 300.0, 61, 3);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 50, 71, 6);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 70, 5);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 100, 17, 4);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 20, 40, 57, 7);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 300.0, 34, 3);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 50, 11, 6);

INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
VALUES ("name", 0, 15, 16, 5);


INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (67.4, CURRENT_TIMESTAMP , 6);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (47.4, CURRENT_TIMESTAMP , 1);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (12, CURRENT_TIMESTAMP , 6);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (28.3, CURRENT_TIMESTAMP , 3);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (51.1, CURRENT_TIMESTAMP , 10);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (32.1, CURRENT_TIMESTAMP , 11);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (72, CURRENT_TIMESTAMP , 12);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (44, CURRENT_TIMESTAMP , 23);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (51, CURRENT_TIMESTAMP , 22);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (91.1, CURRENT_TIMESTAMP , 25);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (42.2, CURRENT_TIMESTAMP , 19);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (68.3, CURRENT_TIMESTAMP , 16);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (32.5, CURRENT_TIMESTAMP , 12);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (71.4, CURRENT_TIMESTAMP , 16);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (33.4, CURRENT_TIMESTAMP , 26);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (43.4, CURRENT_TIMESTAMP , 16);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (11.4, CURRENT_TIMESTAMP , 9);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (4.4, CURRENT_TIMESTAMP , 5);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (6.4, CURRENT_TIMESTAMP , 9);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (7.4, CURRENT_TIMESTAMP , 22);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (53.4, CURRENT_TIMESTAMP , 21);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (32.5, CURRENT_TIMESTAMP , 3);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (71.4, CURRENT_TIMESTAMP , 21);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (33.4, CURRENT_TIMESTAMP , 22);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (43.4, CURRENT_TIMESTAMP , 7);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (11.4, CURRENT_TIMESTAMP , 5);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (4.4, CURRENT_TIMESTAMP , 17);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (6.4, CURRENT_TIMESTAMP , 21);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (7.4, CURRENT_TIMESTAMP , 4);

INSERT INTO Mesurement (Value, DateTime, SensorID)
VALUES (53.4, CURRENT_TIMESTAMP , 11);
