use camposdin
go

CREATE TABLE enlaces(
id_enlace int IDENTITY(1,1) NOT NULL PRIMARY KEY,
id_formulario int NOT NULL,
nombre_tabla varchar(50),
nombre_campo varchar(50),
nombre_campo_form varchar(50),
visibilidad_campo bit,
borrado tinyint NOT NULL,
vigencia tinyint NOT NULL,
);