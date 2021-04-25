DROP DATABASE IF EXISTS AatroxStore;

CREATE DATABASE AatroxStore;

USE AatroxStore;

CREATE TABLE tienda(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tex_mombre TEXT NOT NULL COMMENT "Nombre de la empresa con formato Aatrox Store 'NOMBRE_COLONIA'",
    tex_Direccion TEXT NOT NULL COMMENT "FORMATO 'COLONIA/CALLE/EDIFICIO'",
    tex_email TEXT NOT NULL,
    tex_region TEXT NOT NULL COMMENT "CIUDAD DONDE TIENE LA TIENDA FISICA",
    tex_telefono TEXT NOT NULL
);

INSERT INTO tienda(tex_mombre,tex_Direccion,tex_email,tex_region,tex_telefono) VALUES 
    ("Aatrox Store City Mall","City Mall frente Aeropuerto Toncontin","aatroxstore@gmail.com",
    "Tegucigalpa","22262425");

CREATE TABLE usuario(
    id BIGINT NOT NULL AUTO_INCREMENT primary KEY,
    tex_UsuarioNombre TEXT NOT NULL COMMENT "Nombre de usuario para iniciar sesión",
    tex_Contraseña TEXT NOT NULL COMMENT "contraseña para iniciar sesión",
    dte_fechaRegistro TIMESTAMP NOT NULL DEFAULT NOW() COMMENT "Fecha de creacion de cuenta",
    enu_EstadoLogin ENUM("online","Offline") NOT NULL DEFAULT "online"
);

CREATE TABLE Empleado(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Usuario_FK BIGINT NOT NULL,
    FOREIGN KEY(id_Usuario_FK) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_tienda_FK BIGINT NOT NULL,
    FOREIGN KEY(id_tienda_FK) REFERENCES tienda(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_nombre TEXT NOT NULL,
    tex_direccion TEXT NOT NULL,
    tex_telefono TEXT NOT NULL,
    tex_email TEXT NOT NULL
);

CREATE TABLE Administrador(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario_FK BIGINT NOT NULL,
    FOREIGN KEY(id_usuario_FK) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_Nombre TEXT NOT NULL,
    tex_email TEXT NOT NULL,
    tex_telefono TEXT NOT NULL
);

CREATE TABLE cliente(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario_fk BIGINT,
    FOREIGN KEY(id_usuario_fk) REFERENCES usuario(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    tex_nombre TEXT NOT NULL,
    tex_apellido TEXT NOT NULL,
    tex_email TEXT NOT NULL,
    tex_direccion TEXT NOT NULL,
    tex_telefono TEXT NOT NULL,
    tex_region TEXT NOT NULL,
    tex_dni TEXT NOT NULL,
    tex_CiudadEntrega TEXT NOT NULL
);

CREATE TABLE InformacionBancaria(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente_FK BIGINT NOT NULL,
    FOREIGN KEY(id_cliente_FK) REFERENCES cliente(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_NumeroTarjeta TEXT NOT NULL,
    Enu_tipoTarjeta ENUM("debito","credito")
);

CREATE TABLE Creditos(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente_FK BIGINT NOT NULL,
    FOREIGN KEY(id_cliente_FK) REFERENCES cliente(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_TipoContrato TEXT NOT NULL,
    tex_NombreEmpresa TEXT NOT NULL COMMENT "en caso de no tener una empresa se le pone el primer nombre y apellido del cliente"
);


CREATE TABLE CarritoCompras(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente_FK BIGINT NOT NULL,
    FOREIGN KEY(id_cliente_FK) REFERENCES cliente(id) ON DELETE CASCADE ON UPDATE CASCADE,
    int_Producto_ID BIGINT UNSIGNED NOT NULL,
    sma_cantidad SMALLINT UNSIGNED NOT NULL,
    dat_FechaAdicion TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE Ventas(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente_FK BIGINT NOT NULL,
    FOREIGN KEY(id_cliente_FK) REFERENCES cliente(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_tienda_FK BIGINT NOT NULL,
    FOREIGN KEY(id_tienda_FK) REFERENCES tienda(id),
    dat_FechaVenta TIMESTAMP NOT NULL DEFAULT NOW(),
    enu_Estado ENUM("Recibida","cancelada","pendiente","enviada") DEFAULT "pendiente"
);

CREATE TABLE Detalles_De_Pedido(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_venta BIGINT NOT NULL,
    tex_ProductoNombre TEXT NOT NULL,
    sma_Canitdad SMALLINT UNSIGNED NOT NULL,
    dou_CostoUnidad DOUBLE NOT NULL,
    dou_subTotal DOUBLE NOT NULL
);

CREATE TABLE EmpresaEnvio(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tex_nombre TEXT NOT NULL,
    tex_email TEXT NOT NULL,
    tex_telefono TEXT NOT NULL,
    tex_direccion TEXT NOT NULL,
    tex_region TEXT NOT NULL
);


CREATE TABLE Envio(
    ID BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_venta_fk BIGINT NOT NULL,
    FOREIGN KEY(id_venta_fk) REFERENCES Ventas(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_EmpresaEnvio_fk BIGINT NOT NULL,
    FOREIGN KEY(id_EmpresaEnvio_fk) REFERENCES EmpresaEnvio(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_TipoEnvio TEXT NOT NULL,
    sma_CostoEnvio SMALLINT UNSIGNED NOT NULL,
    tex_RegionEnvio TEXT NOT NULL,
    dat_EnvioFecha TIMESTAMP NOT NULL DEFAULT NOW(),
    tex_direccion TEXT NOT NULL,
    tex_NotasPedido TEXT NOT NULL
);

CREATE TABLE Facturas(
    id BIGINT NOT NULL auto_increment PRIMARY KEY,
    id_envio_fk BIGINT NOT NULL,
    FOREIGN KEY(id_envio_fk) REFERENCES Envio(id) ON DELETE CASCADE ON UPDATE CASCADE,
    dat_FechaCreacion TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE Inventario(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_tienda_fk BIGINT NOT NULL,
    FOREIGN KEY(id_tienda_fk) REFERENCES tienda(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_name TEXT NOT NULL COMMENT "FORMATO: INVENTARIO + NOMBRE_TIENDA"
);

CREATE TABLE Imagenes(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tex_nombre TEXT NOT NULL COMMENT "de la fomra nombre.(jpg,png,...) guardadas en la carpeta img",
    id_producto BIGINT NOT NULL,
    dat_fechaAdicion TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE Marcas(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tex_nombre TEXT NOT NULL
);

CREATE TABLE Categoria(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tex_nombre TEXT NOT NULL
);

CREATE TABLE Paquetes(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dat_FechaElaboracion TIMESTAMP NOT NULL DEFAULT NOW(),
    tex_descripcion TEXT NOT NULL,
    dou_precio DOUBLE NOT NULL,
    tex_nombre TEXT NOT NULL
);

CREATE TABLE Producto(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Marca_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Marca_fk) REFERENCES Marcas(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_Categoria_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Categoria_fk) REFERENCES Categoria(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tex_nombre TEXT NOT NULL,
    tex_descripcion TEXT NOT NULL,
    tex_modelo TEXT NOT NULL,
    sma_precio SMALLINT UNSIGNED NOT NULL,
    enu_estado ENUM("disponible","no disponible") DEFAULT "disponible"
);

CREATE TABLE GestionPaquetes(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Paquete_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Paquete_fk) REFERENCES Paquetes(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_Producto_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Producto_fk) REFERENCES Producto(id) ON DELETE CASCADE ON UPDATE CASCADE
) COMMENT "Tabla intermedia entre producto y Paquetes";

CREATE TABLE Contiene(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Inventario_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Inventario_fk) REFERENCES Inventario(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_Producto_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Producto_fk) REFERENCES Producto(id) ON DELETE CASCADE ON UPDATE CASCADE,
    sma_cantidad SMALLINT UNSIGNED NOT NULL
);

CREATE TABLE Proveedor(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tex_nombre TEXT NOT NULL, 
    tex_direccion TEXT NOT NULL,
    tex_telefono TEXT NOT NULL,
    tex_email TEXT NOT NULL,
    tex_Ciudad TEXT NOT NULL,
    tex_pais TEXT NOT NULL
);

CREATE TABLE PedidoTienda(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Inventario_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Inventario_fk) REFERENCES Inventario(id) ON DELETE CASCADE ON UPDATE CASCADE,
    id_Proveedor_fk BIGINT NOT NULL,
    FOREIGN KEY(id_Proveedor_fk) REFERENCES Proveedor(id) ON DELETE CASCADE ON UPDATE CASCADE,
    dat_FechaCompra TIMESTAMP NOT NULL DEFAULT NOW(),
    enu_Estado ENUM("Recibida","cancelada","pendiente","enviada") DEFAULT "pendiente",
    dou_total DOUBLE 
) COMMENT "COMPRAS DE LA TIENDA PARA ABASTECER";

CREATE TABLE Detalles_PedidoTienda(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_compra BIGINT NOT NULL,
    tex_ProductoNombre TEXT NOT NULL,
    sma_Canitdad SMALLINT UNSIGNED NOT NULL,
    dou_CostoUnidad DOUBLE NOT NULL,
    dou_subTotal DOUBLE NOT NULL
);


