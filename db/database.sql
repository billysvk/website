CREATE DATABASE calendar;

CREATE TABLE admin (
id int NOT NULL,
username varchar(50) NOT NULL,
password varchar(255) NOT NULL
)
INSERT INTO admin (id, username, password) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

CREATE TABLE courseFiles(
  [id] [int] IDENTITY(1,1) NOT NULL,
  [name] [varchar](200) NOT NULL,
  [image] [nvarchar](max) NULL,
  [labId] [varchar](50) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

CREATE TABLE event_calendar (
id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
labId int NOT NULL,
event_date varchar(255)  DEFAULT NULL,
Title varchar(255) DEFAULT NULL,
description varchar(255) DEFAULT NULL,
h_1 int NOT NULL DEFAULT 0,
h_2 int NOT NULL DEFAULT 0,
h_3 int NOT NULL DEFAULT 0,
h_4 int NOT NULL DEFAULT 0,
h_5 int NOT NULL DEFAULT 0,
h_6 int NOT NULL DEFAULT 0,
status int NOT NULL DEFAULT 0,
UserId varchar(255) DEFAULT NULL,
UserRole varchar(255) DEFAULT NULL
)

CREATE TABLE  event_subscriptions (
  labId int NOT NULL,
  userId int NOT NULL,
  email varchar(50) NULL,
  name varchar(50) NULL,
  unic varchar(50) NULL,
  event_id int NULL
)

CREATE TABLE  images (
  id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
  name varchar(200)  NOT NULL,
  image varchar(MAX)  NULL,
  labId varchar(50) NULL
)

CREATE TABLE  lab_info (
  id int NOT NULL IDENTITY(1,1),
  labId int  NULL,
  event_id int  NULL,
  title varchar(255) NULL,
  comment varchar(1024)  NULL
)

CREATE TABLE  labFiles (
  id int NOT NULL,
  name varchar(200) NULL,
  image varchar(MAX) NULL,
  labId varchar(50) NULL
)

CREATE TABLE  labs (
  id int NOT NULL IDENTITY(1,1),
  name varchar(50)  NULL,
  position int  NULL,
  title varchar(255) NULL,
  comment varchar(255)  NULL,
  imageName varchar(200) NULL
)

CREATE TABLE menu (
   id int NOT NULL IDENTITY(1,1),
  name varchar(50)  NULL,
  position int  NULL
)

INSERT INTO menu ( name, position) VALUES
('Main Page', 1),
('Contact', 3),
('Labs', 2),
('Login/Register', 4)

CREATE TABLE registerRequests (
   id int NOT NULL IDENTITY(1,1),
   userName  varchar(50) NOT NULL,
   userEmail  varchar(50) NOT NULL,
   userPass  varchar(50) NOT NULL,
   userRole  varchar(1) NULL,
   requestStatus varchar(1) NULL DEFAULT NULL
  PRIMARY KEY (id)
)

CREATE TABLE  users (
  id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
  userName varchar(50)  NOT NULL,
  userEmail varchar(50)  NOT NULL,
  userPass varchar(50) NOT NULL,
  UserRole varchar(1) NULL
)
