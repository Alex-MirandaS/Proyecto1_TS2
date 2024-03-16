CREATE DATABASE g_swap;

USE g_swap;

CREATE TABLE UserType(
    idUserType INT auto_increment,
    rol VARCHAR (50) NOT NULL,
    PRIMARY KEY (idUserType)
);

CREATE TABLE User(
    idUser INT auto_increment,
    username VARCHAR (50) NOT NULL,
    password VARCHAR (50) NOT NULL,
    firstName VARCHAR (50) NOT NULL,
    lastName VARCHAR (50),
    idUserType INT NOT NULL,
    PRIMARY KEY (idUser),
    FOREIGN KEY (idUserType) REFERENCES UserType(idUserType)
);

CREATE TABLE Profile(
    idProfile INT auto_increment,
    online BOOLEAN NOT NULL,
    chelines FLOAT NOT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY (idProfile),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);

CREATE TABLE PayMethod(
    idPayMethod INT auto_increment,
    cardNumber INT NOT NULL,
    cvv INT NOT NULL,
    expiredDate DATE NOT NULL,
    total FLOAT NOT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY (idPayMethod),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);

CREATE TABLE Cupon(
    idCupon INT auto_increment,
    totalChelines FLOAT NOT NULL,
    name VARCHAR (50) NOT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY (idCupon),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);

CREATE TABLE Category(
    idCategory INT auto_increment,
    name VARCHAR (50) NOT NULL,
    PRIMARY KEY (idCategory)
);

CREATE TABLE ProductService(
    idProductService INT auto_increment,
    name VARCHAR (50) NOT NULL,
    price FLOAT NOT NULL,
    description VARCHAR (150) NOT NULL,
    idCategory INT NOT NULL,
    idOwner INT NOT NULL,
    PRIMARY KEY (idProductService),
    FOREIGN KEY (idOwner) REFERENCES User(idUser),
    FOREIGN KEY (idCategory) REFERENCES Category(idCategory)
);

CREATE TABLE Catalogues(
    idCatalogues INT auto_increment,
    available BOOLEAN NOT NULL,
    idProductService INT NOT NULL,
    PRIMARY KEY (idCatalogues),
    FOREIGN KEY (idProductService) REFERENCES ProductService(idProductService)
);

CREATE TABLE TypeReport(
    idTypeReport INT auto_increment,
    reportName VARCHAR (50) NOT NULL,
    PRIMARY KEY (idTypeReport)
);

CREATE TABLE Report(
    idReport INT auto_increment,
    idProductService INT NOT NULL,
    idTypeReport INT NOT NULL,
    PRIMARY KEY (idReport),
    FOREIGN KEY (idProductService) REFERENCES ProductService(idProductService),
    FOREIGN KEY (idTypeReport) REFERENCES TypeReport(idTypeReport)
);

CREATE TABLE Chat(
    idChat INT auto_increment,
    idProductService INT NOT NULL,
    idRequested INT NOT NULL,
    idOwner INT NOT NULL,
    PRIMARY KEY (idChat),
    FOREIGN KEY (idProductService) REFERENCES ProductService(idProductService),
    FOREIGN KEY (idRequested) REFERENCES User(idUser),
    FOREIGN KEY (idOwner) REFERENCES User(idUser)
);

CREATE TABLE Message(
    idMessage INT auto_increment,
    content VARCHAR (200) NOT NULL,
    date DATE NOT NULL,
    hour TIME NOT NULL, 
    idChat INT NOT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY (idMessage),
    FOREIGN KEY (idChat) REFERENCES Chat(idChat),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);
