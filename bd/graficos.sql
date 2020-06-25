create database graficos;
	use graficos;

	DROP TABLE IF EXISTS `ventas`;

	CREATE TABLE `ventas` (
		`id_venta` int(11) NOT NULL AUTO_INCREMENT,
		`fechaVenta` date DEFAULT NULL,
		`montoVenta` float DEFAULT NULL,
		PRIMARY KEY (`id_venta`)
	) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


	INSERT INTO `ventas` VALUES (1,'2017-05-05',10000),
	(2,'2017-07-09',12000),
	(3,'2017-09-20',20000),
	(4,'2018-01-01',50000),
	(5,'2018-01-25',8000),
	(6,'2018-02-14',10000);