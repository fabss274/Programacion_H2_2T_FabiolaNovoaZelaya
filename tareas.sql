drop database if exists superTareas;
create database superTareas;
use superTareas;

create table usuario (
correo varchar(50) primary key,
nombre varchar(50),
contra varchar(100)
);

create table tarea (
idtarea int primary key auto_increment,
titulo varchar(50),
descripcion varchar(200), 
estado varchar(50),
correo varchar(50),
foreign key (correo) references usuario(correo)
);

insert into usuario(correo, nombre, contra) values 
("probando@gmail.com", "probando", "1234");

insert into tarea (correo, titulo, descripcion, estado) values
("probando@gmail.com", "hito programacion", "registro de usuario", "en curso");

select * from usuario;
select * from tarea;

update tarea set estado = 'probando' where correo = 'bbb' and titulo='sfg';