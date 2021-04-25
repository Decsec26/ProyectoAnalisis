-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: aatroxstore
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,1,'Huawei P40 Pro','\nPantalla de 6,58 pulgadas (1200 x 2640)\'<br>\'\nProcesador HiSilicon Kirin 990 5G \'<br>\'\nCámara trasera de 50 MP + 40 MP + 12 MP + cámara frontal de profundidad de 32 MP + \nprofundidad \'<br>\'\nCapacidad de la batería: 4200 mAh \'<br>\'\nColor plateado \'<br>\'\nAlmacenamiento 8GB \'<br>\'\nSistema Operativo Android 10.0 \'<br>\'','ELS-NX9',19056,'disponible'),(2,1,1,'Huawei P30 Pro','\n6.47 pulgadas 1080 x 2340 píxeles, relación 19.5:9\'<br>\'Android 9.0 + EMUI 9.0\'<br>\'IP68 resistente al polvo y al agua \n\'<br>\'vidrio frontal/trasero, marco de aluminio\'<br>\'128 GB + 8 GB de RAM\'<br>\'NM (nano memoria), hasta 256 GB (utiliza SIM 2) \n\'<br>\'Batería Li-Po 4200 mAh no extraíble\'<br>\'Hisilicon Kirin 980 Octa-core 2.6 GHz\'<br>\'Cámara trasera: 40 MP, f/1.6, 1.063 in \n(ancho) + 20 MP, f/2.2, 0.630 in (ultraancho) + periscopio 8 MP, f/3.4, 4.921 in (telefoto) \n\'<br>\'Cámara frontal: 32 MP, f/2.0, (ancho) – Video: 2160p @ 30 fps\n','VOG-L29 ',10848,'disponible'),(3,3,1,'Samsung Galaxy A12','\nCapacidad de almacenamiento de memoria	4 GB\'<br>\'Tamaño de pantalla	6.5 Pulgadas\'<br>\'IP68 resistente al polvo y al agua \n\'<br>\'vidrio frontal/trasero, marco de aluminio\'<br>\'128 GB + 8 GB de RAM\'<br>\'NM (nano memoria), hasta 256 GB (utiliza SIM 2) \n\'<br>\'Batería Li-Po 4200 mAh no extraíble\'<br>\'Cámara trasera: 40 MP, f/1.6, 1.063 in \n(ancho) + 20 MP, f/2.2, 0.630 in (ultraancho) + periscopio 8 MP, f/3.4, 4.921 in (telefoto) \n\'<br>\'Cámara frontal: 32 MP, f/2.0, (ancho) – Video: 2160p @ 30 fps\n','SM-A12 ',6500,'disponible'),(4,8,2,'Portatil Lenovo','\nProcesador Intel Pentium Gold 6405U Dual Core 2.4 GHz, 4 GB DDR4-2400 MHz RAM, 128 GB SSD de almacenamiento\'<br>\'\nPantalla antirreflejos HD LED de 14 pulgadas (1366 x 768), gráficos Intel UHD integrados\'<br>\'\n802. 11AC Wi-Fi y Bluetooth 5.0 Combo, cámara de 0.3 MP con obturador de privacidad y micrófonos de matriz dual, 2 x 1. Altavoces de 5 W con audio Dolby\'<br>\'\n1 USB 2.0, 2 USB 3.2 Gen 1, 1 HDMI 1.4b, 1 conector combinado para auriculares/micrófono, 1 lector de tarjetas multimedia\'<br>\'\nWindows 10 OS\'<br>\'\n','Lenovo145',10000,'disponible'),(5,6,2,'PC Gaming DELL de escritorio','\nModelo de CPU	Core i7\'<br>\'\nTamaño de la memoria de la computadora	16 GB\'<br>\'\nTamaño de la memoria RAM instalada	16 GB\'<br>\'\nSeries	Dell G5 Gaming Desktop\'<br>\'\nCoprocesador de gráficos	NVIDIA GeForce RTX 2060\'<br>\'\nColor	Negro\'<br>\'\nTipo de RAM para gráficos	GDDR6\'<br>\'\nTamaño de pantalla	1 Centímetros\'<br>\'\nTamaño de gráficos de RAM\'\'<br>\'\n','DELL G5',42936,'disponible'),(6,5,3,'Impresora a color Cannon','\nSalida de la impresora	Color\'<br>\'\nColor	Black\'<br>\'\nTecnología de impresión	Inkjet\'<br>\'\nMarca	Canon\'<br>\'\nMedios impresos	Glossy photo paper\'<br>\'\nTecnología de conectividad	Wi-Fi, USB, Ethernet\'<br>\'\nDúplex	No\'<br>\'\nTipo de escáner	Document\'<br>\'\nNombre del modelo	PIXMA iP\'<br>\'\nResolución	10000\'<br>\'\n','IP8720',9216,'disponible'),(7,7,4,'Teclado gaming Razer','\nTecnología de conectividad	Wired\'<br>\'\nMarca	Razer\'<br>\'\nDescripción del teclado	QWERTY\'<br>\'\nNúmero de teclas	104\'<br>\'\nCompatible con Alexa\'<br>\'\n','Keyboard145',1200,'disponible'),(8,4,4,'Mouse gaming Logitech','\nTecnología de conectividad	USB\'<br>\'\nColor	Black\'<br>\'\nTecnología de detección de movimiento	Optical\'<br>\'\nMarca	Logitech G\'<br>\'\nOrientación de la mano	Ambidextrous\'<br>\'\nPlataforma de hardware	PC\'<br>\'\nSistema operativo	OS\'<br>\'\nMaterial	Metal\'<br>\'\nDimensiones del artículo LxWxH	1.57 x 2.95 x 5.2 pulgadas\'<br>\'\nPeso del artículo	0.27 Libras\'<br>\'\n','MouseLogi14',1100,'disponible'),(9,4,4,'Auriculares Logitech G Pro','\nMarca	Logitech G\'<br>\'\nColor	Negro\'<br>\'\nTecnología de conectividad	Wired\'<br>\'\nNombre del modelo	PRO Gaming Headset\'<br>\'\nFactor de forma	Over Ear\'<br>\'\nTipo de conector	USB\'<br>\'\nControl de ruido	Isolation acoustique\'<br>\'\nCable para auriculares	3.5 millimeters\'<br>\'\nPeso del artículo	259 Gramos\'<br>\'\nTipo de control	Call Control\'<br>\'\n','G PRO',1680,'disponible'),(10,2,1,'iphone 11 Pro max','\nProcessor:	Hexa Core	\'<br>\'\nModelo:	Apple iPhone 11 Pro Max\'<br>\'\nOperating System:	iOS	\'<br>\'\nEstilo:	Bar\'<br>\'\nManufacturer Color:	Midnight Green	\'<br>\'\nCapacidad de almacenamiento:	64 GB\'<br>\'\nCamera Resolution:	12.0 MP\'<br>\'\n','pro max',11680,'disponible'),(11,2,2,'Apple MacBook Air','\nMarca	Apple\'<br>\'\nSistema operativo	Mac OS\'<br>\'\nFabricante de CPU	Apple\'<br>\'\nTamaño de pantalla	13.3 Pulgadas\'<br>\'\nTamaño de la memoria de la computadora	8 GB\'<br>\'\nTamaño del disco duro	256 GB\'<br>\'\nCantidad de procesadores	8\'<br>\'\nFabricante de procesador de gráficos	Apple\'<br>\'\nNombre del modelo	MacBook Air\'<br>\'\n','MacBook Air',12780,'disponible'),(12,8,4,'Monitor Lenovo (2560x1440)','\nTamaño de pantalla	27 Pulgadas\'<br>\'\nResolución	QHD Wide 1440p\'<br>\'\nTecnología de pantalla	LCD\'<br>\'\nMarca	Lenovo\'<br>\'\nSeries	L27q-30\'<br>\'\nRelación de aspecto	16:09\'<br>\'\nInterfaz de hardware	HDMI\'<br>\'\nVelocidad de actualización	75 Hz\'<br>\'\nTiempo de respuesta	4 Milisegundos\'<br>\'\nResolución Máxima de Pantalla	2560 x 1440 Pixels\'<br>\'\n','LenovoM27P',6216,'disponible');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-25 16:47:25
