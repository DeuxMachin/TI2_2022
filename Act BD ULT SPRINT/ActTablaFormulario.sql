use camposdin
go

CREATE TABLE formulario(
id_formulario int IDENTITY(1,1) NOT NULL PRIMARY KEY,
id_usuario int NOT NULL,
nombre_formulario varchar(50),
borrado tinyint NOT NULL,
vigencia tinyint NOT NULL,
);