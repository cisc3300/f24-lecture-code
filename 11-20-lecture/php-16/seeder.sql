CREATE TABLE `users`
(
    `id`   int(11) NOT NULL AUTO_INCREMENT,
    `firstName` varchar(254) NOT NULL,
    `lastName` varchar(254) NOT NULL,
    `email` varchar(254) NOT NULL,
    `password` varchar(254) NOT NULL,
    `sessionExpiration` TIMESTAMP NULL,
    primary key (`id`)
);