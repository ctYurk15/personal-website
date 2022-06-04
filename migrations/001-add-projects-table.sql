CREATE TABLE IF NOT EXISTS `projects`
(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255),
    `description` VARCHAR(255),
    `github` VARCHAR(255)
);