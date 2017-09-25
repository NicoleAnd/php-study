CREATE TABLE goods(
	`id` int unsigned not null AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(64) not null,
    `typeid` int unsigned not null,
    `price` double(6,2) unsigned not null,
    `total` int unsigned not null,
    `pic` varchar(32) not null,
    `note` text,
    `addtime` int unsigned not null
);