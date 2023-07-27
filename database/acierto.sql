CREATE DATABASE BD_ACIERTO;

--
-- Estructura de tabla para la tabla `usuarios`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED auto_increment PRIMARY KEY NOT NULL,
  `uuid` CHAR(36)  UNIQUE NOT NULL DEFAULT uuid() ,
  `idUpdated` CHAR(36) NOT NULL DEFAULT 0,
  `idRegistered` CHAR(36) NOT NULL DEFAULT 0,
  `nickName` varchar(25) NOT NULL DEFAULT '',
  `displayName` varchar(25) UNIQUE NOT NULL,
  `firstName` varchar(50)  NOT NULL DEFAULT '',
  `lastName` varchar(50)  NOT NULL DEFAULT '',
  `login` varchar(50) UNIQUE NOT NULL,
  `email` varchar(50) UNIQUE  NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 1,
  `photo` varchar(200)  NOT NULL DEFAULT '',
  `createdAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


INSERT INTO users (`displayName`,`nickName`,`firstName`,`login`,`password`,`email`) VALUES
('admin', 'admin', 'admin', 'sistemas@aciertoays.com', '96b3b5e64a1d23251646e1637af3e2ba40337e234a3fcc3172b429db19e97f8f0bd5dd221446b5ac6c869b5399f56aef05cd271114404b4fb1e8ab7b78e4375b', 'sistemas@aciertoays.com'),
('administrador','administrador','administrador','aciertoays@gmail.com', 'b38a1a47a89daed39dd0be08fa0d3378ed08c8f1fc3e8ff4d5fe9f1ac4aef492b3df1b2377a24a27688e45ad42d78b31c66e41243ede4f25ee1d77d38997de09','aciertoays@gmail.com')

------------------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `blacklist_tokens` ( 
  `id` bigint(20) UNSIGNED auto_increment PRIMARY KEY NOT NULL,
  `token` varchar(1000) UNIQUE NOT NULL,
  `reason` VARCHAR(255) DEFAULT NULL,
  `uuid` CHAR(36) NOT NULL DEFAULT 0,
  `expiration_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
