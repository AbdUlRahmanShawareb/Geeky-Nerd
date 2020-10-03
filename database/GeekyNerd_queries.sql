CREATE DATABASE geeky_nerd;

CREATE TABLE users(
 name VARCHAR(50) NOT NULL,
 username VARCHAR(50) NOT NULL UNIQUE,
 email VARCHAR(70) NOT NULL UNIQUE,
 pass VARCHAR(50) NOT NULL,
 bio VARCHAR(1000) NULL,
 studyat VARCHAR(100) NULL,
 workat VARCHAR(100) NULL,
 facebook VARCHAR(300) NULL,
 twitter VARCHAR(300) NULL,
 insta VARCHAR(300) NULL,
 linkedin VARCHAR(300) NULL,
 github VARCHAR(300) NULL,
 stackoverflow VARCHAR(300) NULL
);

CREATE TABLE emails(
    sendto VARCHAR(100) NOT NULL,
    sendfrom VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    content VARCHAR(1000) NOT NULL
);

CREATE TABLE blog(
    publisherusername VARCHAR(70) NOT NULL,
    content VARCHAR(1000) NOT NULL
);

CREATE TABLE to_do(
    task VARCHAR(100) NOT NULL UNIQUE,
    done int NOT NULL
);


    
