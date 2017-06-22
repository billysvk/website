CREATE TABLE  labs (
  id int NOT NULL,
  name varchar(50)  NULL,
  position int  NULL,
  title varchar(255) NULL,
  content varchar(1024)  NULL
)

INSERT INTO menu (id, name, position, title, content) VALUES
(1, 'Main Page', 1, '', ''),
(2, 'Contact', 3, '', ''),
(3, 'Labs', 2, '', ''),
(4, 'Login/Register', 4, '', '');

ALTER TABLE menu
  ADD PRIMARY KEY (id);

  CREATE TABLE  eventcalendar (
  id int  NULL,
  Title varchar(255)  NULL,
  Detail int  NULL,
  eventDate DateTime NULL,
  content text  NULL
)


CREATE TABLE admin (
id int NOT NULL,
username varchar(50) NOT NULL,
password varchar(255) NOT NULL
)
INSERT INTO admin (id, username, password) VALUES
(1, 'admin', 'admin');
//d033e22ae348aeb5660fc2140aec35850c4da997
CREATE TABLE members (
  memberID int NOT NULL ,
  username varchar(255)  NULL,
  password varchar(255)  NULL,
  email varchar(255)  NULL,
  active varchar(255)  NULL,
  resetToken varchar(255) DEFAULT NULL,
  resetComplete varchar(3) DEFAULT 'No',
  PRIMARY KEY (memberID)
) 

---------------------------



ALTER TABLE menu
  ADD PRIMARY KEY (id);

  CREATE TABLE  eventcalendar (
  id int  NULL,
  Title varchar(255)  NULL,
  Detail int  NULL,
  eventDate DateTime NULL,
  content text  NULL
)


CREATE TABLE admin (
id int NOT NULL,
username varchar(50) NOT NULL,
password varchar(255) NOT NULL
)
INSERT INTO admin (id, username, password) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

----------------------------
-- to parakatw script gia to dbo.menu
CREATE TABLE dbo.menu (
   id int NOT NULL IDENTITY(1,1),
  name varchar(50)  NULL,
  position int  NULL,
  title varchar(255) NULL,
  content varchar(255) NULL
);

INSERT INTO menu ( name, position, title, content) VALUES
('Main Page', 1, '', ''),
('Contact', 3, '', ''),
('Labs', 2, '', '');

----------------------------

CREATE TABLE registerRequests (
  id int NOT NULL IDENTITY(1,1),
   userName  varchar(50) NOT NULL,
   userEmail  varchar(50) NOT NULL,
   userPass  varchar(50) NOT NULL,
   userRole  varchar(1) NULL,
   requestStatus varchar(1) NULL DEFAULT NULL
  PRIMARY KEY (id)
)
CREATE TABLE  labs (
  id int NOT NULL IDENTITY(1,1),
  name varchar(50)  NULL,
  position int  NULL,
  title varchar(255) NULL,
  content varchar(256)  NULL
);