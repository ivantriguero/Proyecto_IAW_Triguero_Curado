create table usuarios(
	cod_usuario int not null auto_increment,
    nombre varchar(20) not null,
    passwd varchar(128) not null,
    apellidos varchar(30),
    direccion varchar(150),
    email varchar(40),
    tipo varchar(15),
    primary key(cod_usuario)
 );
 
 create table pedidos(
	cod_pedido int not null auto_increment,
    fecha date,
    cod_usuario int,
    primary key (cod_pedido),
    foreign key (cod_usuario) references usuarios(cod_usuario)
 );
create table proveedores(
	cod_proveedor int not null auto_increment,
    nombre varchar(20) not null,
    primary key (cod_proveedor)
);
create table productos(
	cod_producto int not null auto_increment,
    descripcion varchar(20),
    precio decimal(4,2),
	cod_proveedor int,
    imagen longblob,
    stock int,
    primary key(cod_producto),
    foreign key (cod_proveedor) references proveedores(cod_proveedor)
);

create table incluyen(
	cod_producto int,
	cod_pedido int,
    Unidades int,
    CONSTRAINT PK_incluyen PRIMARY KEY (cod_producto,cod_pedido),
    foreign key (cod_producto) references productos(cod_producto),
    foreign key (cod_pedido) references pedidos(cod_pedido)
);

alter table pedidos add precio decimal(6,2);
alter table pedidos add productos varchar(20000);
