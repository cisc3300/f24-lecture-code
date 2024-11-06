--create university database
CREATE DATABASE `university`;

-- create students table
CREATE TABLE `students`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `addressID` int(11) NOT NULL,
    primary key (`id`)
);

-- ALTER TABLE Customers ADD Email varchar(255);
-- ALTER TABLE Customers DROP COLUMN Email;

-- create student addresses table, student has one
CREATE TABLE `studentAddresses`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `address`   varchar(254) NOT NULL,
    `state`     varchar(80),
    `studentID` int(11) NOT NULL,
    primary key (`id`)
);

-- create student emergency contacts table, student has many
CREATE TABLE `studentEmergencyContacts`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`   varchar(254) NOT NULL,
    `phone`     varchar(11),
    `email`     varchar(254),
    `studentID` int(11) NOT NULL,
    primary key (`id`)
);

-- create classes table
CREATE TABLE `classes`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`     varchar(80) NOT NULL,
    primary key (`id`)
);

-- create student classes join table
CREATE TABLE `studentClasses`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `classID`   int(11) NOT NULL,
    `studentID` int(11) NOT NULL,
    primary key (`id`)
);


-- seed some test data
insert into students (name, addressID)
values ('Bethany Shaw', 1);
insert into students (name, addressID)
values ('Sheri Fitzgerald', 2);
insert into students (name, addressID)
values ('Patrick Burgess', 3);
insert into students (name, addressID)
values ('Chester Orourke', 4);
insert into students (name, addressID)
values ('Francisco Jefferson', 5);
insert into students (name, addressID)
values ('Larry J. Shurtleff', 6);
insert into students (name, addressID)
values ('Joshua A. Hansen', 7);
insert into students (name, addressID)
values ('Deborah L. Johnson', 8);
insert into students (name, addressID)
values ('Danielle W. Brothers', 9);
insert into students (name, addressID)
values ('Richard M. Cordero', 10);

insert into classes (title)
values ('CISC 1000');
insert into classes (title  )
values ('CISC 3300');

insert into studentAddresses (address, state, studentID)
values ('2975 Vineyard Drive', 'MI', 1);
insert into studentAddresses (address, state, studentID)
values ('4573 Pallet Street', 'NY', 2);
insert into studentAddresses (address, state, studentID)
values ('2944 Beechwood Avenue', 'IL', 3);
insert into studentAddresses (address, state, studentID)
values ('2102 Robinson Court', 'MI', 4);
insert into studentAddresses (address, state, studentID)
values ('3175 Sheila Lane', 'NY', 5);
insert into studentAddresses (address, state, studentID)
values ('2510 Star Route', 'IL', 6);
insert into studentAddresses (address, state, studentID)
values ('2076 Arrowood Drive', 'MI', 7);
insert into studentAddresses (address, state, studentID)
values ('657 Rogers Street', 'NY', 8);
insert into studentAddresses (address, state, studentID)
values ('3864 Abner Road', 'IL', 9);
insert into studentAddresses (address, state, studentID)
values ('4505 Hillcrest Circle', 'MI', 10);

insert into studentEmergencyContacts (name, phone, email, studentID)
values ('test1', '1234232435', 'test1@example.com', 1);
insert into studentEmergencyContacts (name, phone, email, studentID)
values ('test2', '2354232434', 'test2@example.com', 1);
insert into studentEmergencyContacts (name, phone, email, studentID)
values ('test3', '2341231234', 'test3@example.com', 1);
insert into studentEmergencyContacts (name, phone, email, studentID)
values ('test4', '1231231234', 'test4@example.com', 2);
insert into studentEmergencyContacts (name, phone, email, studentID)
values ('test5', '1234324354', 'test5@example.com', 2);

insert into studentClasses (classID, studentID)
values (1, 1);
insert into studentClasses (classID, studentID)
values (1, 2);


-- some example queries

-- select all from students
select * from students;

-- select certain columns from students
select id, name from students;

-- select all from students where name equals something
select * from students where name = 'Bethany Shaw';

-- select all from students where id is less than 2;
select * from students where id < 2;

-- select all from students where name contains Shaw;
select * from students where name like '%Shaw%';

-- select all from students order by name, order by name descending(last to first)
select * from students order by name;
select * from students order by name desc;

-- GROUP BY

-- The GROUP BY statement groups rows that have the same values into summary rows

--  columns in a group by must be:
--  an expression used as one of the group by criteria , or ...
--  an aggregate function , or ...
--  a literal value

-- group a result set by state and then count the ids
select count(id), state from studentAddresses group by state;

-- limit and offset
select * from students limit 2;
select * from students limit 2 offset 2;

-- relationships and joins

-- joins get data from two related tables and the nature of
-- that relationship determines how we'll use the join

-- left join vs inner join

-- left selects all of the first table and any matches on the right
select * from students left join studentEmergencyContacts on students.id = studentEmergencyContacts.studentID;

-- inner selects only matches, inner is default with just the "join" keyword
select * from students join studentEmergencyContacts on students.id = studentEmergencyContacts.studentID;

-- relationships

-- one to one
-- get the address of a student
select * from students join studentAddresses on students.id = studentAddresses.studentID;

-- one to many
-- get a student's emergency contacts
select * from students join studentEmergencyContacts on students.id = studentEmergencyContacts.studentID;

-- many to many
-- get all student class assignments
SELECT
    students.*,
    studentClasses.id AS studentClassID,
    classes.title AS classTitle
FROM
    students
        JOIN
    studentClasses AS studentclasses ON students.id = studentClasses.studentID
        JOIN
    classes ON classes.id = studentClasses.classID


-- aliases
select name as studentName from students;

-- update
update studentAddresses SET address = 'value1' where id = 1;

-- delete

delete studentAddresses where id = 1;