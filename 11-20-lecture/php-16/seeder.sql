CREATE TABLE `users`
(
    `id`   int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(254) NOT NULL,
    `description` varchar(254) NOT NULL,
    primary key (`id`)
);

insert into projects (name, description)
values ('first project', 'first description');