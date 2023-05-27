create database Piel;
show databases;
/*drop database Piel;*/
/*drop table Usuario;*/
/*drop table Articulo;*/
/*drop table Carrito;*/
/*drop table Venta;*/
/*drop table Proveedor;*/
/*ALTER TABLE Usuario ADD Edad varchar(2);*/
use Piel;
show tables;

create table Usuario(
ID_U mediumint(7) unsigned not null AUTO_INCREMENT,
nombreU varchar (60) not null,
contrasena varchar (10) not null,
correoU varchar (50) not null,
telefono varchar (15),
numTarjeta varchar(16) not null,
domicilio varchar (200) not null,
primary key (ID_U)
);

create table Proveedor(
ID_P Smallint(5) unsigned not null AUTO_INCREMENT,
nombreP varchar (60) not null,
correoP varchar(50) not null,
primary key (ID_P) 
);

create table Articulo(
ID_A Smallint(5) unsigned not null AUTO_INCREMENT,
fkID_P Smallint unsigned not null,
nombreA varchar (100) not null,
cantidad smallint not null,
precio decimal(7,2) not null,
descripcion varchar(255) not null,
primary key (ID_A),
foreign key (fkID_P) references Proveedor(ID_P) ON UPDATE CASCADE ON DELETE CASCADE
);

create table Venta(
ID_V Int unsigned not null AUTO_INCREMENT,
fkID_U mediumint(7) unsigned not null,
total decimal(11,2) not null,
fecha date not null,
tipoPago varchar(50) not null,
primary key(ID_V),
foreign key (fkID_U) references Usuario(ID_U) ON UPDATE CASCADE ON DELETE CASCADE
);
describe Articulo;
create table Carrito(
cantidadArt Smallint unsigned not null,
precioCompra decimal(8,2),
fkArticulo Smallint unsigned,
foreign key (fkArticulo) references Articulo(ID_A) ON UPDATE CASCADE ON DELETE CASCADE,
fkVenta Int unsigned,
foreign key (fkVenta) references Venta(ID_V) ON UPDATE CASCADE ON DELETE CASCADE
);


Insert into Usuario values(1,'Karen Carrillo Guzman','5654rgh65g','admin18@gmail.com','2294565467','7645673298745687','Mar #23');
Insert into Usuario values(2,'Carlota Guzman Gamboa','78hgc54gy6','carlgg@gmail.com','2297647658','1285438766549876','Vista mar #87');
Insert into Usuario values(3,'Tomas Carrillo Munive','8po7nhyt67','tomass2@gmail.com','2292456785','9977542765437654','Arboledas #45');
Insert into Usuario values(4,'Arturo Avalos Guzman','976hvbg452','artur4@gmail.com','2298674376','2278564367895645','Jblobos #45');
Insert into Usuario values(5,'Marlen Trinidad Ochoa','wlkubvt67u','marlen60@gmail.com','2299713254','1134654387650987','Vergel #76');
Insert into Usuario values(6,'Daniel Vallejo Barragan','129it54673','dan656@gmail.com','2291569764','1097285345678954','Costa de oro #96');
Insert into Usuario values(7,'Samuel Barrientos Camarero','1sce456tgd','samuel7@gmail.com','2297475641','2354658761098345','San juan #345');
Insert into Usuario values(8,'Sahid Alcantara Figueroa','qwerf4356u','sahid@gmail.com','2292476543','2987634756667453','Matamoros #76');
Insert into Usuario values(9,'Teresa Yepez Olmos','2juytgvbyt','teresa4@gmail.com','2296743657','9812763456786546','Rio nilo #34');
Insert into Usuario values(10,'Claudia Gomez Lopez','1965486756','claudiiia9@gmail.com','2296734586','9986536235687535','Chamoros #257');
Insert into Usuario values(11,'Juan Perez Piña','123dsd3120','juanpepi2@gmail.com','2299010288','9274612299010288','Dobles #12');
Insert into Usuario values(12,'Karla Dominguez Sanchez','a2310d3039','karlads192@gmail.com','2295410201','9023610899810538','Rio loma #233');
Insert into Usuario values(13,'Daniela Morales Paez','ajf19q3083','danielamorap1@gmail.com','2291830292','9853610879430138','Dos lomas #983');
Insert into Usuario values(14,'Carlos Rodriguez Martinez','n8760d9056','carlosrm82@gmail.com','2291210298','8733619899320868','Infonavit Chiveria #73');
Insert into Usuario values(15,'Lizbeth Ferrer Juarez','oi678d3729','lizoe12@gmail.com','2294419802','6923950899810554','Rio medio #75');
Insert into Usuario values(16,'Juana Rodriguez Vargas','nb310870sh','juana76rvh@gmail.com','2299410884','8323674899650590','Nilo dorado #32');
Insert into Usuario values(17,'Luz Lopez Garcia','kj31984589','luzgfper521@gmail.com','2291879802','4323560898887532','Las brisas #72');
Insert into Usuario values(18,'Rafael Palacios Castillo','12345678gs','rafaekd27@gmail.com','2297690521','9823616499810528','Costa dorada #190');
Insert into Usuario values(19,'Irene Cruz Hernandez','kjn1873039','irene23dc@gmail.com','2293218709','4323617639811321','Los volcanes #133');
Insert into Usuario values(20,'Ruben Mendez Ferrer','kj372d92vc','ruben213v@gmail.com','2293282201','7226210899431292','Tonala #21');
Select* from usuario;

/*delete from usuario;*/

Insert into Proveedor values(1,'Estrella','Estrellamx@gmail.com');
Insert into Proveedor values(2,'Pampas','Pampasmx@gmail.com');
Insert into Proveedor values(3,'Tunder','Tundermx@gmail.com');
Insert into Proveedor values(4,'Imagine','Imaginemx@gmail.com');
Insert into Proveedor values(5,'Fire','Firemx@gmail.com');
Insert into Proveedor values(6,'Bamboos','Bamboosmx@gmail.com');
Insert into Proveedor values(7,'BellezaMar','BelMar23@gmail.com');
Insert into Proveedor values(8,'Girasol','Girasol3mx@gmail.com');
Insert into Proveedor values(9,'Lluvia','Lluvia2@gmail.com');
Insert into Proveedor values(10,'Nice','NiceMexico@gmail.com');
Select*from Proveedor;

/*delete from Proveedor;*/

Insert into Articulo values(1,1,'cerave','1','323.87','crema para el cuidado de la piel grasa');
Insert into Articulo values(2,2,'dove','1','254.34','jabon para baño');
Insert into Articulo values(3,3,'neutrogena','1','453.87','gel a base de agua para piel seca');
Insert into Articulo values(4,4,'eucerin','1','132.67','valsamo para la piel');
Insert into Articulo values(5,5,'palmolive','1','216.78','shampoo para el cabello');
Insert into Articulo values(6,7,'L´oreal','1','89.54','crema para piel');
Insert into Articulo values(7,6,'nivea','1','398.76','protector solar');
Insert into Articulo values(8,8,'armonia','1','498.87','gel hidratante de piel');
Insert into Articulo values(9,9,'ISDIN','1','234.76','fotoprotector solar');
Insert into Articulo values(10,10,'sothys','1','134.43','mascara iluminadora');
Insert into Articulo values(11,6,'Mascarilla para el cuello',150,178.99,'Producto de importación, Esta mezcla especial hidrata y repone su piel dándole una apariencia suave y flexible.');
Insert into Articulo values(12,10,'Rodillo de hielo para masaje facial',200,253.22,'El producto es ampliamente utilizado en antiarrugas y elimina las líneas finas para suavizar la piel. reducir los poros y refrescar su piel sin productos químicos.');
Insert into Articulo values(13,7,'Máscara Comprimida',644,154.23,'Hecho de tela no tejida de alta calidad, suave, delicada y sin irritación.');
Insert into Articulo values(14,8,'Crema Blanqueadora Antiarrugas Para Ojos',300,44.14,'Ayuda a reafirmar y mejora la elasticidad y la textura de la piel para crear ojos de aspecto más joven, levanta, refina y conserva el tejido ocular, dejando que tus ojos se vean frescos y radiantes, minimizando las ojeras.');
Insert into Articulo values(15,9,'Masajeador facial anti-arrugas',203,218.23,'A través del frío y el calor alternativamente, mejorar la absorción profunda de la piel.');
Insert into Articulo values(16,6,'Suero Facial',150,222.99,'Los ingredientes principales son el polisacárido tremella fuciformis, el arándano y otros extractos de frutas que brindan diferentes efectos. humedece profundamente y repara la piel dañada.');
Insert into Articulo values(17,10,'Botella de Spray de Perfume Recargable',200,219.22,'Adecuado para uso en viajes: peso ligero, puede ponerlo en su maleta, mochila, bolsa de mensajero, etc., muy adecuado para uso en viajes.');
Insert into Articulo values(18,7,'Set de Cuidado de la Piel con Vitamina C',644,2588.23,'Hecho de tela no tejida de alta calidad, suave, delicada y sin irritación.');
Insert into Articulo values(19,8,'Crema Blanqueadora Antiarrugas Para Ojos',300,44.14,'Reduce visiblemente la apariencia de las manchas de la edad en solo 4 semanas.');
Insert into Articulo values(20,9,'Crema iluminadora para el cuidado de la piel',203,154.23,'Crema iluminadora para el cuidado de la piel.');
Select*from Articulo;

/*delete from Articulo;*/

Insert into Venta values(1,11,178.99,'2023-02-21','Tarjeta de credito');
Insert into Carrito values(1,178.99,11,1);

Insert into Venta values(2,12,611.2,'2023-02-21','Tarjeta de credito');
Insert into Carrito values(2,357.98,11,2);
Insert into Carrito values(1,253.22,12,2);

Insert into Venta values(3,13,352.6,'2023-02-22','Tarjeta de credito');
Insert into Carrito values(2,308.46,13,3);
Insert into Carrito values(1,44.14,14,3);

Insert into Venta values(4,14,1091.15,'2023-02-22','Tarjeta de credito');
Insert into Carrito values(5,1091.15,15,4);

Insert into Venta values(5,15,891.96,'2023-02-22','Tarjeta de credito');
Insert into Carrito values(4,891.96,16,5);

Insert into Venta values(6,16,1753.76,'2023-02-22','Tarjeta de credito');
Insert into Carrito values(8,1753.76,17,6);

Insert into Venta values(7,12,3026.67,'2023-02-22','Tarjeta de credito');
Insert into Carrito values(2,438.44,17,7);
Insert into Carrito values(1,2588.23,18,7);

Insert into Venta values(8,17,2676.51,'2023-02-22','Tarjeta de credito');
Insert into Carrito values(2,88.28,19,8);
Insert into Carrito values(1,2588.23,18,8);

Insert into Venta values(9,18,2676.51,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(2,308.46,20,9);

Insert into Venta values(10,19,771.15,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(5,771.15,20,10);

Insert into Venta values(11,20,894.95,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(5,894.95,11,11);

Insert into Venta values(12,11,2025.76,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(8,2025.76,12,12);

Insert into Venta values(13,13,925.38,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(6,925.38,13,13);

Insert into Venta values(14,13,1363.82,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(6,925.38,13,14);
Insert into Carrito values(2,438.44,17,14);

Insert into Venta values(15,15,2347.05,'2023-02-23','Tarjeta de credito');
Insert into Carrito values(6,925.38,13,15);
Insert into Carrito values(2,438.44,17,15);
Insert into Carrito values(5,894.95,11,15);
Insert into Carrito values(2,88.28,19,15);


Insert into Venta values(16,11,178.99,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(1,178.99,11,16);

Insert into Venta values(17,12,611.2,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(2,357.98,11,17);
Insert into Carrito values(1,253.22,12,17);

Insert into Venta values(18,13,352.6,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(2,308.46,13,18);
Insert into Carrito values(1,44.14,14,18);

Insert into Venta values(19,14,1091.15,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(5,1091.15,15,19);

Insert into Venta values(20,15,891.96,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(4,891.96,16,20);

Insert into Venta values(21,16,1753.76,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(8,1753.76,17,21);

Insert into Venta values(22,12,3026.67,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(2,438.44,17,22);
Insert into Carrito values(1,2588.23,18,22);

Insert into Venta values(23,17,2676.51,'2023-02-22','Tarjeta de debito');
Insert into Carrito values(2,88.28,19,23);
Insert into Carrito values(1,2588.23,18,23);

Insert into Venta values(24,18,2676.51,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(2,308.46,20,24);

Insert into Venta values(25,19,771.15,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(5,771.15,20,25);

Insert into Venta values(26,20,894.95,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(5,894.95,11,26);

Insert into Venta values(27,11,2025.76,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(8,2025.76,12,27);

Insert into Venta values(28,13,925.38,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(6,925.38,13,28);

Insert into Venta values(29,13,1363.82,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(6,925.38,13,29);
Insert into Carrito values(2,438.44,17,29);

Insert into Venta values(30,15,2347.05,'2023-02-23','Tarjeta de debito');
Insert into Carrito values(6,925.38,13,30);
Insert into Carrito values(2,438.44,17,30);
Insert into Carrito values(5,894.95,11,30);
Insert into Carrito values(2,88.28,19,30);

select*from Venta;
select*from Carrito;

/*UPDATE Usuario SET ID_U = 100, nombreU = 'Juan' WHERE ID_U=1;*/

/*DELETE FROM Usuario WHERE ID_U = 1;*/

/*CONSULTAS*/

/*Articulos con su proveedor*/
SELECT ID_A, nombreA, nombreP
FROM Articulo
INNER JOIN Proveedor
ON Articulo.fkID_P = Proveedor.ID_P;

/*Ventas que se han hecho a un cliente*/
SELECT Usuario.nombreU,Carrito.fkVenta,Articulo.nombreA, Carrito.cantidadArt, Carrito.precioCompra
FROM Articulo
INNER JOIN Carrito ON Articulo.ID_A = Carrito.fkArticulo
INNER JOIN Venta on Venta.ID_V=Carrito.fkVenta
INNER JOIN Usuario ON Usuario.ID_U = Venta.fkID_U WHERE Usuario.ID_U=14;

/*Productos que se han vendido en el día*/
SELECT Articulo.ID_A, Articulo.nombreA, Carrito.cantidadArt , Venta.fecha
FROM Articulo
INNER JOIN Carrito ON Articulo.ID_A = Carrito.fkArticulo
INNER JOIN Venta on Venta.ID_V=Carrito.fkVenta where fecha = '2023-02-22';

/*Producto que mas se ha vendido en un dia*/
SELECT articulo.nombreA, SUM(carrito.cantidadArt) as cantidad
    FROM carrito
    INNER JOIN articulo ON carrito.fkArticulo = articulo.ID_A
    INNER JOIN Venta on Venta.ID_V=Carrito.fkVenta where fecha = '2023-02-23'
    GROUP BY articulo.ID_A
    ORDER BY SUM(carrito.cantidadArt) DESC LIMIT 1;
    
/*Producto que mas se ha vendido*/
SELECT articulo.nombreA, SUM(carrito.cantidadArt) as cantidad
    FROM carrito
    INNER JOIN articulo ON carrito.fkArticulo = articulo.ID_A
    GROUP BY articulo.ID_A
    ORDER BY SUM(carrito.cantidadArt) DESC LIMIT 1;
