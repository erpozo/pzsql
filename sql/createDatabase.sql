CREATE DATABASE IF NOT EXISTS `pzsql`
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE pzsql;

CREATE TABLE IF NOT EXISTS `database` (
    basedatos_ID INT AUTO_INCREMENT PRIMARY KEY,
    username CHAR(255) NOT NULL UNIQUE,
    pw CHAR(255) NOT NULL,
    born timestamp default current_timestamp(),
    lastupdate timestamp default current_timestamp()
);

CREATE TABLE IF NOT EXISTS `table` (
    table_ID INT AUTO_INCREMENT PRIMARY KEY,
    tablename CHAR(255) NOT NULL UNIQUE,
    born timestamp default current_timestamp(),
    lastupdate timestamp default current_timestamp()
);